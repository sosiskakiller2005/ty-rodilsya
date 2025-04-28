document.addEventListener('DOMContentLoaded', function () {
    let products = document.querySelector('.products');
    let button = document.querySelector('.unwrap-btn');
  
    if (button) {
      button.addEventListener('click', function () {
      if (products.classList.contains('hidden')) {
        products.classList.remove('hidden');
        this.textContent = 'СВЕРНУТЬ ДЕСЯТИЛЕТИЕ';
      } else {
        products.classList.add('hidden');
        this.textContent = 'РАЗВЕРНУТЬ ДЕСЯТИЛЕТИЕ';
          }
        });
      }
    });
  