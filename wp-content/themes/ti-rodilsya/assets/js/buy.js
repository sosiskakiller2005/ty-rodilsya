document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.cart');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Отменяем стандартную отправку формы

        // fetch('send_email.php', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/x-www-form-urlencoded'
        //     },
        //     body: new URLSearchParams({ action: 'send_email' })
        // })
        // .then(response => response.text())
        // .then(data => {
        //     document.getElementById('response-message').innerText = data; // Показываем ответ сервера
        // })
        // .catch(error => console.error('Ошибка:', error));

        fetch('/wp-admin/admin-ajax.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ action: 'send_email_action' })
        })
    });
});


