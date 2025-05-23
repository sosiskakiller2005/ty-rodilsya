document.addEventListener('DOMContentLoaded', function () {
  // Находим все кнопки разворачивания
  const buttons = document.querySelectorAll('.unwrap-btn');

  // Добавляем обработчик событий для каждой кнопки
  buttons.forEach(button => {
    button.addEventListener('click', function () {
      // Находим родительский элемент десятилетия
      const decadeArticle = this.closest('.decade-article');

      // Находим блок товаров внутри этого десятилетия
      const products = decadeArticle.nextElementSibling;

      if (products && products.classList.contains('products')) {
        // Переключаем классы видимости
        if (products.classList.contains('hidden')) {
          products.classList.remove('hidden');
          products.classList.add('visible');
          this.textContent = 'СВЕРНУТЬ ДЕСЯТИЛЕТИЕ';
        } else {
          products.classList.remove('visible');
          products.classList.add('hidden');
          this.textContent = 'РАЗВЕРНУТЬ ДЕСЯТИЛЕТИЕ';
        }
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const burgerMenu = document.querySelector(".header__hamburger-btn");
  const menu = document.querySelector(".menu");
  const closeBtn = document.getElementById("closeBtn");

  burgerMenu.addEventListener("click", () => {
    menu.classList.toggle("active");

    // Отключаем прокрутку страницы, когда меню открыто
    if (menu.classList.contains("active")) {
      document.body.style.overflow = "hidden";
    } else {
      document.body.style.overflow = "auto";
    }
  });

  closeBtn.addEventListener("click", () => {
    menu.classList.remove("active");
  })
});


// Активные кнопки в меню профиля
document.addEventListener('DOMContentLoaded', function() {
  const links = document.querySelectorAll('.profile-nav-link');

  // Добавляем обработчики событий для каждой ссылки
  links.forEach(link => {
      link.addEventListener('click', function(event) {
          event.preventDefault(); // Отменяем стандартное поведение ссылки

          // Удаляем активный класс со всех ссылок
          links.forEach(lnk => lnk.classList.remove('profile-nav-active'));
          
          // Добавляем активный класс к текущей ссылке
          this.classList.add('profile-nav-active');
      });
  });
});