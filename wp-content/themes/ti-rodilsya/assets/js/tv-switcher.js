document.addEventListener('DOMContentLoaded', function() {
    const switcher = document.querySelector('.tv-switcher');
    const video = document.getElementById('tv-video');
    
    // Обработчик клика на переключателе
    switcher.addEventListener('click', function() {
      if (!switcher.classList.contains('rotated')) {
        switcher.classList.add('rotated');
        video.play();
      } else {
        switcher.classList.remove('rotated');
        video.pause();
      }
    });
  });