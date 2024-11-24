const modal = document.getElementById("projectModal");
const openModalButton = document.getElementById("openModalButton");
const closeModalButton = document.getElementById("closeModalButton");
const projectIdInput = document.getElementById('projectId');

const body = document.body;

function closeModalAction() {
    body.classList.remove("no-scroll");
    modal.classList.remove('show');
    setTimeout(() => {
        modal.style.display = "none";
        modal.setAttribute('hidden', true);
    }, 300);
}

modal.addEventListener('close', function() {
    closeModalAction();
});


openModalButton.onclick = function() {
    body.classList.add("no-scroll");
    modal.classList.add("no-scroll");
    modal.classList.add('show');
    modal.removeAttribute("hidden");
    modal.style.display = "block";
};

closeModalButton.onclick = function() {
    closeModalAction();
};

window.onclick = function(event) {
    if (event.target === modal) {
       closeModalAction();
    }
};

document.getElementById("projectForm").onsubmit = function(event) {
    modal.style.display = "none";
};

document.addEventListener("DOMContentLoaded", function() {
    const priceInput = document.getElementById("projectPrice");
});


document.getElementById('projectForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    
    const form = e.target;
    const formData = new FormData(form);

    try {
        const response = await fetch(`${BACKEND_URL}/api/projects`, {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error(`Erro: ${response.status} ${response.statusText}`);
        }

        const result = await response.json();
        Swal.fire({
            title: 'Sucesso!',
            text: 'Projeto criado com sucesso!',
            icon: 'success',
            iconColor: '#f9601f',
            confirmButtonText: 'OK',
            confirmButtonColor: '#f9601f',
        }).then(() => {
            this.reset();
            closeModalAction();
            location.reload();
        });
    } catch (error) {
        Swal.fire({
            title: 'Erro!',
            text: 'Ocorreu um erro ao registrar teu projeto. Tente novamente mais tarde!',
            icon: 'error',
            iconColor: '#f9601f',
            confirmButtonText: 'OK',
            confirmButtonColor: '#f9601f',
        });
    }
});

function confirmDelete(projectId, event) {
    event.preventDefault();
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Essa ação não pode ser revertida!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f9601f',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`${BACKEND_URL}/api/projects/${projectId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Erro ao deletar o projeto.');
            })
            .then(data => {
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'O projeto foi deletado com sucesso.',
                    icon: 'success',
                    iconColor: '#f9601f',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#f9601f',
                }).then(() => {
                    location.reload();
                });
            })
            .catch(error => {
                Swal.fire({
                    title: 'Erro!',
                    text: error.message,
                    icon: 'error',
                    confirmButtonColor: '#f9601f',
                });
            });
        }
    });
}

function confirmContract() {
    Swal.fire({
        title: 'Confirmação de Contratação',
        text: "Você tem certeza que deseja contratar este projeto?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f9601f',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, contratar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Sucesso!',
                text: 'O projeto foi contratado com sucesso! Em breve entraremos em contato com você.',
                iconColor: '#f9601f',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#f9601f',
            });
        }
    });
}
