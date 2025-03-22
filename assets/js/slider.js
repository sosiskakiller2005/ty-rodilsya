document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slides img');
    const prevButton = document.querySelector('.slider__button--left');
    const nextButton = document.querySelector('.slider__button--right');
    const paginationItems = document.querySelectorAll('.pagination a');
  
    let currentIndex = 0;
  
    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
      });
      
      paginationItems.forEach(item => item.classList.remove('active'));
      paginationItems[index].classList.add('active');
    }
  
    prevButton.addEventListener('click', event => {
        event.preventDefault(); 
        if (currentIndex > 0) {
          currentIndex--;
        } else {
          currentIndex = slides.length - 1;
        }
        showSlide(currentIndex);
      });
      
      nextButton.addEventListener('click', event => {
        event.preventDefault();
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
          event.preventDefault();
          currentIndex = index;
          showSlide(currentIndex);
        });
      });
  
    showSlide(0);
  });