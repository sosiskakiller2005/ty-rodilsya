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
