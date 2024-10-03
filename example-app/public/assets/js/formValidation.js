document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let hasError = false;

    document.querySelectorAll('.form__error').forEach(error => error.innerText = '');

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

    if (!hasError) {
        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Certifique-se de ter o token CSRF no seu HTML
            },
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Alguma coisa deu errado!');
        })
        .then(data => {
            Swal.fire({
                title: 'Sucesso!',
                text: 'Mensagem cadastrada com sucesso!',
                icon: 'success',
                iconColor: '#f9601f',
                confirmButtonText: 'OK',
                confirmButtonColor: '#f9601f',
            });
            this.reset();
        })
        .catch(error => {
            Swal.fire({
                title: 'Erro!',
                text: 'Erro ao cadastrar a mensagem. Por favor, tente novamente.',
                icon: 'error',
                iconColor: '#f9601f',
                confirmButtonText: 'OK',
                confirmButtonColor: '#f9601f',
            });
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
