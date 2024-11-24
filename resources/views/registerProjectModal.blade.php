<div id="projectModal" class="modal" hidden>
    <div class="modal-content">
        <h2 id="modalTitle">Registrar Projeto</h2>
        <form id="projectForm" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <input type="hidden" id="projectId" name="projectId">
            <div class="form__group">
                <label for="projectName" class="form__label">Nome Projeto</label>
                <input type="text" id="projectName" name="projectName" class="form__input" required>
            </div>
            <div class="form__group">
                <label for="projectPrice" class="form__label">Preço do Projeto</label>
                <input type="number" id="projectPrice" name="projectPrice" class="form__input" required>
            </div>
            <div class="form__group">
                <label for="projectDescription" class="form__label">Descrição do Projeto</label>
                <textarea id="projectDescription" name="projectDescription" class="form__input" rows="4" required></textarea>
            </div>
            <div class="form__group">
                <label for="projectImage" class="form__label">Enviar Imagem</label>
                <input type="file" id="projectImage" name="projectImage" class="form__input" accept="image/*">
            </div>
            <button type="submit" id="submitButton" class="button">Registrar Projeto</button>
            <button type="button" id="closeModalButton" class="button">Fechar</button>
        </form>
    </div>
</div>
