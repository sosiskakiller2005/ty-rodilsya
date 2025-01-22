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

document.addEventListener()