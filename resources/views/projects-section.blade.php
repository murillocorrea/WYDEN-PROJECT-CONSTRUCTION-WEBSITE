<section class="projects section" id="projects">
    <button id="openModalButton" class="button">Registrar Projeto</button>

    @include('registerProjectModal')

    <span class="section__subtitle">NOSSOS PROJETOS</span>
    <h2 class="section__title">Últimos Projetos <br> Registrados</h2>
    @dd($projects)
    <div class="projects__container container grid">
        @foreach ($projects->chunk(3) as $chunk)
            <div class="projects__row">
                @foreach ($chunk as $project)
                    <article class="projects__card">
                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="image" class="projects__img">

                        <div class="projects__data">
                            <h2 class="projects__title">{{ $project->name }}</h2>
                            <p class="projects__price">A partir de R$ {{ $project->price }}</p>

                            <p>
                                {{ $project->description }}
                            </p>
                            <div class="button-container">
                                <form action="{{ route('projects.delete', $project->id) }}" method="POST" style="display: inline;" id="delete-form-{{ $project->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button" onclick="confirmDelete({{ $project->id }}, event)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <button class="button contract-project-button" onclick="confirmContract()">Contratar Projeto</button>
                        </div>
                    </article>
                @endforeach
            </div>
        @endforeach
    </div>
 </section>