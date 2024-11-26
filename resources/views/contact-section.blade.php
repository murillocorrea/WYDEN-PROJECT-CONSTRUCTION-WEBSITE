<section class="contact section contact_section" id="contact">
    <div class="container">
        <span class="section__subtitle">Contate-nos</span>
        <h2 class="section__title">Escreva Para Nós e Construa</h2>

        <div class="contact__container grid">
            <img src="${BACKEND_URL}/assets/img/contact-img.png" alt="image" class="contact__img">

            <div class="contact__data grid">
                <!-- Formulário de Contato -->
                <div class="contact__card">
                    <h3 class="contact__title">Envie uma Mensagem</h3>
                    <div class="contact__form">
                        <form action="{{ route('contact-information.store') }}" method="POST" id="contactForm">
                            @csrf
                            <div class="form__group">
                                <label for="name" class="form__label">Seu nome</label>
                                <input type="text" id="name" name="name" class="form__input" placeholder="Seu nome" required>
                                <small id="nameError" class="form__error"></small>
                            </div>

                            <div class="form__group">
                                <label for="email" class="form__label">Seu Email</label>
                                <input type="email" id="email" name="email" class="form__input" placeholder="seu@email.com" required>
                                <small id="emailError" class="form__error"></small>
                            </div>

                            <div class="form__group">
                                <label for="phone" class="form__label">Seu Telefone</label>
                                <input type="text" id="phone" name="phone" class="form__input" placeholder="(55) 9 9999-9999" required>
                                <small id="phoneError" class="form__error"></small>
                            </div>
                            <div class="form__group">
                                <label for="subject" class="form__label">Assunto</label>
                                <input type="text" id="subject" name="subject" class="form__input" placeholder="Assunto" required>
                                <small id="subjectError" class="form__error"></small>
                            </div>

                            <div class="form__group">
                                <label for="message" class="form__label">Sua Mensagem</label>
                                <textarea id="message" name="message" class="form__input" rows="5" placeholder="Sua Mensagem" required></textarea>
                                <small id="messageError" class="form__error"></small>
                            </div>

                            <button type="submit" class="button">Enviar Mensagem</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
