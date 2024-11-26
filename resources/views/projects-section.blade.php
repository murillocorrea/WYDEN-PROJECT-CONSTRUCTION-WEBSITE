<section class="projects section" id="projects">
    <button id="openModalButton" class="button">Registrar Projeto</button>

    @include('registerProjectModal')

    <span class="section__subtitle">NOSSOS PROJETOS</span>
    <h2 class="section__title">Últimos Projetos <br> Registrados</h2>
    <div id="projects-container" class="projects__container container grid">
    </div>
</section>

<script>
    fetch(`${BACKEND_URL}/api/projects/get`, { method: 'POST' })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro na resposta: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Dados recebidos:', data);

            if (Array.isArray(data) && data.length > 0) {
                const projectsContainer = document.getElementById('projects-container');
                projectsContainer.innerHTML = '';

                const chunks = chunkArray(data, 3);

                chunks.forEach(chunk => {
                    const row = document.createElement('div');
                    row.classList.add('projects__row');

                    chunk.forEach(project => {
                        const projectCard = document.createElement('article');
                        projectCard.classList.add('projects__card');
                        console.log(alert)
                        alert(project.image_path)
                        projectCard.innerHTML = `
                            <img src="${project.image_path ? `${BACKEND_URL}/storage/${project.image_path}` : 'default-image.jpg'}" alt="image" class="projects__img">
                            <div class="projects__data">
                                <h2 class="projects__title">${project.name}</h2>
                                <p class="projects__price">A partir de R$ ${project.price}</p>
                                <p>${project.description}</p>
                                <div class="button-container">
                                    <form action="${BACKEND_URL}/projects/delete/${project.id}" method="POST" style="display: inline;" id="delete-form-${project.id}">
                                        <button type="submit" class="delete-button" onclick="confirmDelete(${project.id}, event)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <button class="button contract-project-button" onclick="confirmContract()">Contratar Projeto</button>
                            </div>
                        `;

                        row.appendChild(projectCard);
                    });

                    projectsContainer.appendChild(row);
                });
            } else {
                console.log('Nenhum projeto encontrado');
                document.getElementById('projects-container').innerHTML = '<p>Nenhum projeto encontrado.</p>';
            }
        })
        .catch(error => {
            console.error('Erro ao processar a requisição:', error);
            alert('Ocorreu um erro ao carregar os projetos. Tente novamente mais tarde.');
        });

    // Função para dividir um array em chunks
    function chunkArray(array, size) {
        const result = [];
        for (let i = 0; i < array.length; i += size) {
            result.push(array.slice(i, i + size));
        }
        return result;
    }
</script>
