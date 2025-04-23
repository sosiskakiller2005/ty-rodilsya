document.addEventListener('DOMContentLoaded', () => {
  const sliders = document.querySelectorAll('.gift-ideas-slider'); // Найти все карусели

  sliders.forEach((slider) => {
    const slides = slider.querySelector('.gift-slides');
    const slideCount = slider.querySelectorAll('.slide').length;
    const prevButton = slider.querySelector('.slider-button.prev');
    const nextButton = slider.querySelector('.slider-button.next');
    const visibleSlides = 2; // Количество видимых слайдов
    let currentIndex = 0;

    function updateSlider() {
      const offset = -(currentIndex * (100 / visibleSlides)); // Рассчитать смещение
      slides.style.transform = `translateX(${offset}%)`;
    }

    prevButton.addEventListener('click', () => {
      currentIndex = (currentIndex > 0) ? currentIndex - 1 : slideCount - visibleSlides;
      updateSlider();
    });

    nextButton.addEventListener('click', () => {
      currentIndex = (currentIndex < slideCount - visibleSlides) ? currentIndex + 1 : 0;
      updateSlider();
    });

    updateSlider(); // Инициализация карусели
  });
});