document.addEventListener('DOMContentLoaded', function () {
  let products = document.getElementById('products');
  let button = document.getElementById('buyBtn');

  button.addEventListener('click', function () {
    if (products.classList.contains('hidden')) {
      products.classList.remove('hidden');
      products.classList.add('visible')
      this.textContent = 'СВЕРНУТЬ ДЕСЯТИЛЕТИЕ';
    } else {
      products.classList.remove('visible')
      products.classList.add('hidden');
      this.textContent = 'РАЗВЕРНУТЬ ДЕСЯТИЛЕТИЕ';
    }
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