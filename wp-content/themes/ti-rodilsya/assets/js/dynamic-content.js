// document.addEventListener('DOMContentLoaded', function () {
//     const links = document.querySelectorAll('.menu-link');
//     const contentContainer = document.getElementById('dynamic-content');

//     links.forEach(link => {
//         link.addEventListener('click', function (e) {
//             e.preventDefault();

//             // Получаем страницу из атрибута data-page
//             const page = this.dataset.page;

//             // Отправляем AJAX-запрос
//             fetch(ajaxurl, {
//                 method: 'POST',
//                 headers: {
//                     'Content-Type': 'application/x-www-form-urlencoded',
//                 },
//                 body: `action=load_dynamic_page&page=${page}`
//             })
//                 .then(response => response.text())
//                 .then(data => {
//                     contentContainer.innerHTML = data; // Обновляем контент
//                 })
//                 .catch(error => {
//                     contentContainer.innerHTML = 'Ошибка загрузки контента.';
//                     console.error('Ошибка:', error);
//                 });
//         });
//     });
// });


jQuery(document).ready(function ($) {
    // Обработчик клика по пунктам меню
    $('.menu-link').on('click', function (e) {
        e.preventDefault(); // Останавливаем стандартное поведение ссылки

        let page = $(this).data('page'); // Получаем значение data-page
        let url = $(this).attr('href'); // Получаем значение href

        // Обновляем адресную строку без перезагрузки страницы
        history.pushState({ page: page }, '', url);

        // Загружаем контент через AJAX
        loadDynamicContent(page);
    });

    // Функция для загрузки контента
    function loadDynamicContent(page) {
        $.ajax({
            url: ajaxurl, // URL для обработки AJAX-запросов
            method: 'POST',
            data: {
                action: 'load_dynamic_page',
                page: page
            },
            beforeSend: function () {
                $('#dynamic-content').html('<p>Загрузка...</p>'); // Показываем сообщение о загрузке
            },
            success: function (response) {
                $('#dynamic-content').html(response); // Загружаем контент в блок
            },
            error: function () {
                $('#dynamic-content').html('<p>Произошла ошибка. Попробуйте ещё раз.</p>');
            }
        });
    }

    // Обработчик нажатия кнопки "Назад" или "Вперёд" в браузере
    window.onpopstate = function (event) {
        if (event.state && event.state.page) {
            loadDynamicContent(event.state.page);
        }
    };
});
