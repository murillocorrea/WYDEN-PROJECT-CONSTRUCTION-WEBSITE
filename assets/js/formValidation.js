document.addEventListener("DOMContentLoaded", function () {
    const contactForm = document.getElementById('contactForm');

    contactForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        // Limpa mensagens de erro anteriores
        document.querySelectorAll('.form__error').forEach(error => error.innerText = '');

        let hasError = false;

        const name = document.getElementById('name').value;
        if (name.length < 3) {
            document.getElementById('nameError').innerText = 'O nome deve ter pelo menos 3 caracteres.';
            hasError = true;
        }

        const email = document.getElementById('email').value;
        if (!validateEmail(email)) {
            document.getElementById('emailError').innerText = 'Formato de e-mail inválido.';
            hasError = true;
        }

        const phone = document.getElementById('phone').value;
        if (!validatePhone(phone)) {
            document.getElementById('phoneError').innerText = 'O telefone deve estar no formato (55) 9 9999-9999.';
            hasError = true;
        }

        const message = document.getElementById('message').value;
        if (message.length < 10) {
            document.getElementById('messageError').innerText = 'A mensagem deve ter pelo menos 10 caracteres.';
            hasError = true;
        }

        if (hasError) {
            return; // Impede o envio caso haja erros
        }

        const formData = new FormData(contactForm);

        try {
            const response = await fetch(`${BACKEND_URL}/api/contact-information/store`, {
                method: 'POST',
                body: formData
            });

            if (!response.ok) {
                throw new Error(`Erro: ${response.status} ${response.statusText}`);
            }

            const result = await response.json();

            Swal.fire({
                title: 'Sucesso!',
                text: 'Mensagem enviada com sucesso!',
                icon: 'success',
                iconColor: '#f9601f',
                confirmButtonText: 'OK',
                confirmButtonColor: '#f9601f',
            }).then(() => {
                contactForm.reset();
            });
        } catch (error) {
            Swal.fire({
                title: 'Erro!',
                text: 'Ocorreu um erro ao enviar sua mensagem. Por favor, tente novamente mais tarde!',
                icon: 'error',
                iconColor: '#f9601f',
                confirmButtonText: 'OK',
                confirmButtonColor: '#f9601f',
            });
        }
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function validatePhone(phone) {
        const re = /^\(\d{2}\) 9 \d{4}-\d{4}$/;
        return re.test(phone);
    }
});
