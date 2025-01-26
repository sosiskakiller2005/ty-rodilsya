document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.menu-link');
    const contentContainer = document.getElementById('dynamic-content');

    links.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            // Получаем страницу из атрибута data-page
            const page = this.dataset.page;

            // Отправляем AJAX-запрос
            fetch(ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=load_dynamic_page&page=${page}`
            })
                .then(response => response.text())
                .then(data => {
                    contentContainer.innerHTML = data; // Обновляем контент
                })
                .catch(error => {
                    contentContainer.innerHTML = 'Ошибка загрузки контента.';
                    console.error('Ошибка:', error);
                });
        });
    });
});
