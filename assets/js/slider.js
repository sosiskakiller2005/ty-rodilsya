document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slides img');
    const prevButton = document.querySelector('.slider__button--left');
    const nextButton = document.querySelector('.slider__button--right');
    const paginationItems = document.querySelectorAll('.pagination a');
  
    let currentIndex = 0;
  
    // Функция для отображения текущего слайда
    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
      });
      
      // Обновляем активные пункты пагинации
      paginationItems.forEach(item => item.classList.remove('active'));
      paginationItems[index].classList.add('active');
    }
  
    // Событие клика на стрелке влево
    prevButton.addEventListener('click', event => {
        event.preventDefault(); // Предотвращаем стандартное поведение ссылки
        if (currentIndex > 0) {
          currentIndex--;
        } else {
          currentIndex = slides.length - 1;
        }
        showSlide(currentIndex);
      });
      
      // Событие клика на стрелке вправо
      nextButton.addEventListener('click', event => {
        event.preventDefault(); // Предотвращаем стандартное поведение ссылки
        if (currentIndex < slides.length - 1) {
          currentIndex++;
        } else {
          currentIndex = 0;
        }
        showSlide(currentIndex);
      });
  
    // События кликов на пунктах пагинации
    paginationItems.forEach((item, index) => {
        item.addEventListener('click', event => {
          event.preventDefault(); // Предотвращаем стандартное поведение ссылки
          currentIndex = index;
          showSlide(currentIndex);
        });
      });
  
    // Изначально показываем первый слайд
    showSlide(0);
  });