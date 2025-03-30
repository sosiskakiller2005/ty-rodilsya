const track = document.querySelector('.carousel__track');
const slides = Array.from(track.children);
const nextButton = document.querySelector('.carousel__button--right');
const prevButton = document.querySelector('.carousel__button--left');

const slideWidth = slides[0].getBoundingClientRect().width;

// Расставляем слайды в ряд
slides.forEach((slide, index) => {
  slide.style.left = slideWidth * index + 'px';
});

const moveToSlide = (track, currentSlide, targetSlide) => {
  track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
};

// Клик по кнопке "вправо"
nextButton.addEventListener('click', () => {
  const currentSlide = track.querySelector('.current-slide') || slides[0];
  const nextSlide = currentSlide.nextElementSibling;

  if (nextSlide) {
    moveToSlide(track, currentSlide, nextSlide);
    currentSlide.classList.remove('current-slide');
    nextSlide.classList.add('current-slide');
  }
});

// Клик по кнопке "влево"
prevButton.addEventListener('click', () => {
  const currentSlide = track.querySelector('.current-slide') || slides[0];
  const prevSlide = currentSlide.previousElementSibling;

  if (prevSlide) {
    moveToSlide(track, currentSlide, prevSlide);
    currentSlide.classList.remove('current-slide');
    prevSlide.classList.add('current-slide');
  }
});