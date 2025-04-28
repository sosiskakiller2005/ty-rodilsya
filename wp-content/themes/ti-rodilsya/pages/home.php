<?php
/*
Template Name: Шаблон главной страницы
*/
?>

<?php get_header(); ?>
<style>
  .slider {
    position: relative;
    background-image: url("<?php echo get_template_directory_uri(); ?>/assets/img/slider/slider-bg.png");
    background-repeat: no-repeat;
    width: 943px;
    height: 403px;
    margin-bottom: 5px;
    z-index: 1;
  }
  
.tape__left-top {
    position: absolute;
    background-image: url("<?php echo get_template_directory_uri(); ?>/assets/img/slider/tape-1.png");
    width: 109px;
    height: 81px;
    top: -15px;
    left: -15px;
}

.tape__right-top {
    position: absolute;
    background-image: url("<?php echo get_template_directory_uri(); ?>/assets/img/slider/tape-2.png");
    width: 109px;
    height: 81px;
    top: -15px;
    right: -15px;
  }
  
  .tape__right-bottom {
    position: absolute;
    background-image: url("<?php echo get_template_directory_uri(); ?>/assets/img/slider/tape-1.png");
    width: 109px;
    height: 81px;
    bottom: -15px;
    right: -15px;
  }
  
  .tape__left-bottom {
    position: absolute;
    background-image: url("<?php echo get_template_directory_uri(); ?>/assets/img/slider/tape-2.png");
    width: 109px;
    height: 81px;
    bottom: -15px;
    left: -15px;
  }
</style>

    <main class="main">
      <section class="slider-section">
        <!-- Основной блок слайдера -->
        <div class="slider">
          <!-- Слайды -->
          <div class="slides">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/s5.jpg" alt="Слайд №1">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/s6.jpg" alt="Слайд №2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/s2.jpg" alt="Слайд №3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/s3.jpg" alt="Слайд №4">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/promo2.jpg" alt="Слайд №5">
          </div>

          <div class="tape__left-top"></div>
          <div class="tape__right-top"></div>
          <div class="tape__right-bottom"></div>
          <div class="tape__left-bottom"></div>
        </div>

        <!-- Кнопки навигации -->
        <div class="slider-controls">
          <a class="slider__button slider__button--left" href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/arrow-left.png" alt="Влево">
          </a>
          <a class="slider__button slider__button--right" href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/arrow-right.png" alt="Вправо">
          </a>
        </div>

        <!-- Пагинация -->
        <ul class="pagination">
          <li><a href="#" data-slide-index="0"></a></li>
          <li><a href="#" data-slide-index="1"></a></li>
          <li><a href="#" data-slide-index="2"></a></li>
          <li><a href="#" data-slide-index="3"></a></li>
          <li><a href="#" data-slide-index="4"></a></li>
        </ul>
      </section>

      <section class="tv-section">
        <div class="tv">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/tv.png" alt="TV">
          <img class="tv-switcher" src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/tv-switcher.png" alt="Переключатель">
          <div class="tv-video">
            <!-- Добавить постер -->
            <video id="tv-video" preload="auto" loop>
              <source src="https://woolyss.com/f/av1-opus-sita.webm">
            </video>
          </div>
        </div>
        <article class="about-us">
          <h3 class="about-us__title">
            Наша компания создала несколько направлений подарочных видеооткрыток на каждый год, с 1934 и по 1994.
          </h3>
          <p class="about-us__description">
            Наши фильмы перенесут Вас в прошлое - в год Вашего рождения. Уникальные кадры кинохроники оживят
            воспоминания о великих
            событиях и достижениях нашей страны и мира. Вы увидите людей, о которых говорили в новостях, узнаете о
            главных политических изменениях
            и культурных событиях, кинопремьерах и интересных биографиях, наших спортивных победах и житейских историях,
            которые были на слуху именно
            в год вашего рождения, погрузитесь в ностальгическую атмосферу того времени.
          </p>
          <a class="about-us__readmore" href="#">Читать далее »»</a>
          <div class="button-container" id="shop-button">
            <button class="button--green">Универмаг подарков</button>
          </div>
        </article>
      </section>

      <section class="cards-info">
        <h1 class="cards-info__header centered">КАКИЕ БЫВАЮТ ВИДЕООТКРЫТКИ?</h1>
        <div class="cards-info__row">
          <article class="info-article">
            <h2 class="info-article__title">С фильмами на каждый год с 1934 по 1994 гг.</h2>
            <ul class="info-list">
              <li class="info-list__item">Истории съемок лучших фильмов того времени</li>
              <li class="info-list__item">Биографии актеров и режиссеров и многое другое</li>
              <li class="info-list__item">Моменты различных выставок, показов мод, достижения в промышленности, открытия
                в науке</li>
              <li class="info-list__item">Политические, культурные, спортивные достижения</li>
              <li class="info-list__item">Знаменитые люди того времени</li>
            </ul>
          </article>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Diski.png" alt="">
        </div>
        <div class="cards-info__row-reversed">
          <article class="info-article">
            <h2 class="info-article__title">С фильмами к любимым праздникам</h2>
            <div class="info-article__row-reversed">
              <ul class="info-list">
                <li class="info-list__item">Новый год</li>
                <li class="info-list__item">23 февраля</li>
              </ul>
              <ul class="info-list">
                <li class="info-list__item">8 Марта</li>
                <li class="info-list__item">9 Мая</li>
              </ul>
            </div>
          </article>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Film.png" alt="">
        </div>
        <h1 class="cards-info__header centered">Мы предлагаем два вида видеооткрыток</h1>
      </section>

      <section class="cards-types">
        <article class="cards-type__article">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Nabor.png" alt="">
          <h2 class="cards-type__article-title centered">Подарочная видеооткрытка с фильмом
            с возможностью онлайн просмотра</h2>
          <p class="cards-type__article-description centered">Так же в каждой видеооткрытке DVD - диск с соответствующим
            фильмом. Доставка через
            курьерские службы в любую точку мира.</p>
          <div class="button-container">
            <button class="button--green">Купить электронную видеооткрытку</button>
          </div>
        </article>
        <article class="cards-type__article">
          <img class="article__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Nout.png" alt="">
          <h2 class="cards-type__article-title centered">Электронная подарочная видеооткрытка</h2>
          <p class="cards-type__article-description centered"> Вы сможете приобрести ее в электронном виде и подарить
            имениннику в точно назначенное
            Вами время в мессенджер или электронную почту.
            Одаряемый может смотреть фильм неограниченное количество раз в своем личном кабинете на нашем сайте.</p>
          <div class="button-container">
            <button class="button--green">Купить электронную видеооткрытку</button>
          </div>
        </article>
      </section>
  </div>

  <section class="gift-ideas">
    <div class="container">
      <h1 class="gift-ideas__header centered">В каких случаях дарить видеооткрытку?</h1>
      <h2 class="gift-ideas__text centered">Оживить воспоминания прошлых лет</h2>
      <div class="photo-row">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/GR.png" alt="">
        <div class="photo-col">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Godovch.png" alt="">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Vipusk.png" alt="">
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Ubiliy.png" alt="">
      </div>
      <h2 class="gift-ideas__text centered">Создать праздничную атмосферу</h2>
      <div class="photo-row">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/9May.png" alt="">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/HG.png" alt="">
        <div class="photo-col">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/23Fev.png" alt="">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/8Mart.png" alt="">
        </div>
      </div>
    </div>
  </section>

  <section class="gift-ideas-wrapped">
    <div class="gift-ideas-slider">
      <h1 class="gift-ideas__header centered">В каких случаях дарить видеооткрытку?</h1>
        <h2 class="gift-ideas__text centered">Оживить воспоминания прошлых лет</h2>
        <div class="slider-container">
          <div class="gift-slides">
            <div class="slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/GR.png" alt="День Рождения">
            </div>
            <div class="slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Godovch.png" alt="Юбилей компании">
            </div>
            <div class="slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/9May.png" alt="9 Мая">
            </div>
            <div class="slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/HG.png" alt="Новый год">
            </div>
          </div>
          <button class="slider-button prev">‹</button>
          <button class="slider-button next">›</button>
      </div>
    </div>
    <div class="gift-ideas-slider">
        <h2 class="gift-ideas__text centered">Создать праздничную атмосферу</h2>
        <div class="slider-container">
          <div class="gift-slides">
            <div class="slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/GR.png" alt="День Рождения">
            </div>
            <div class="slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Godovch.png" alt="Юбилей компании">
            </div>
            <div class="slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/9May.png" alt="9 Мая">
            </div>
            <div class="slide">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/HG.png" alt="Новый год">
            </div>
          </div>
          <button class="slider-button prev">‹</button>
          <button class="slider-button next">›</button>
      </div>
    </div>
  </section>


  <div class="container">
    <section class="product-categories">
      <div class="category">
        <div class="category-promo">
          <h3 class="category-promo__title">Видеооткрытка с фильмами на каждый год с 1934-1994</h3>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/category-1.png" alt="Видеооткрытка с фильмами на каждый год с 1943-1994"
            class="category-promo__image">
        </div>
        <div class="category-content">
          <p class="category-content__text">На день рождения близкого человека, друга, коллеги, на юбилей свадьбы или
            любую памятную дату Вы можете подарить оригинальный, необычный подарок!<br><br> Фильм о любом годе с 1934 по
            1994 подарит положительные эмоции, вызовет улыбку и надолго останется в памяти.</p>
          <div class="button-container">
            <button class="button--gray" id="">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Tv-brown.png" alt="">СМОТРЕТЬ РОЛИК
            </button>
            <button class="button--gray">Подробнее</button>
          </div>
        </div>
      </div>
      <div class="category">
        <div class="category-promo">
          <h3 class="category-promo__title">Видеооткрытка с фильмами К любимым праздникам</h3>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/category-2.png" alt="Видеооткрытка с фильмами на каждый год с 1943-1994"
            class="category-promo__image">
        </div>
        <div class="category-content">
          <p class="category-content__text">Наша компания создала уникальные фильмы к каждому любимому
            празднику!<br><br>Кадры кинохроники празднования Нового года, видео о том, чем жили миллионы жителей нашей
            страны, какими достижениями гордились и как готовились и отмечали любимые праздники.</p>
          <div class="button-container">
            <button class="button--gray" id="">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Tv-brown.png" alt="">СМОТРЕТЬ РОЛИК
            </button>
            <button class="button--gray">Подробнее</button>
          </div>
        </div>
      </div>
      <div class="category">
        <div class="category-promo">
          <h3 class="category-promo__title">Индивидуальный проект По вашему заказу</h3>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/category-3.png" alt="Видеооткрытка с фильмами на каждый год с 1943-1994"
            class="category-promo__image">
        </div>
        <div class="category-content">
          <p class="category-content__text">День рождения ваших близких, юбилей компании или памятная дата - к любому
            торжественному событию важно подходить творчески. Эффект новизны и обращение к истории, будет воспринят и
            оценен положительно. Закажите индивидуальный фильм юбиляру, имениннику, к свадьбе или любому другому
            празднику!</p>
          <div class="button-container">
            <button class="button--gray" id="">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Tv-brown.png" alt="">СМОТРЕТЬ РОЛИК
            </button>
            <button class="button--gray">Подробнее</button>
          </div>
        </div>
      </div>
    </section>

    <div class="banner">
      Все фильмы с возможностью онлайн просмотра
    </div>

    <section class="product-categories">
      <div class="category-wide">
        <div class="category-promo purple">
          <h3 class="category-promo__title">Электронная видеооткрытка: <br> новый подарок, посвященный году или<br>
            Любимым праздникам</h3>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/category-4.png" alt="Видеооткрытка с фильмами на каждый год с 1943-1994"
            class="category-promo__image-wide">
        </div>
        <div class="category-content">
          <p class="category-content__text">Наша электронная видеооткрытка поможет вам поздравить ваших любимых и
            друзей. Также дополнительно Вы можете написать поздравление и пожелание в самой электронной видеооткрытке,
            отправить её имениннику. Одаряемый получит электронную видеооткрытку, прочтет поздравление и посмотрит
            фильм, который Вы подарили. Фильм будет храниться в личном кабинете именинника и постоянно доступен к
            просмотру.</p>
          <div class="button-container">
            <button class="button--gray">Подробнее</button>
          </div>
        </div>
      </div>

      <div class="category-wide">
        <div class="category-promo wine">
          <h3 class="category-promo__title">СПЕЦИАЛЬНЫЕ НАБОРЫ ДЛЯ ЮБИЛЯРА Набор: Видеооткрытка, ручка со стилусом в
            подарочной коробке + небольшой презент</h3>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/category-4.png" alt="Видеооткрытка с фильмами на каждый год с 1943-1994"
            class="category-promo__image-wide">
        </div>
        <div class="category-content">
          <p class="category-content__text">Каждый из нас заслуживает особенного внимания, особенно когда приближается
            день рождения. И если Вы или Ваш близкий человек юбиляр, то у нас есть для Вас уникальный подарок.
            Представляем Вашему вниманию подарочный набор, который не просто порадует, но и перенесет именинника в эпоху
            своего детства - видеооткрытка, ручка со стилусом в подарочной коробке + небольшой презент. Именно поэтому
            мы создали подарочный набор, который отражает дух времени.</p>
          <div class="button-container">
            <button class="button--gray" id="">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Tv-brown.png" alt="">Смотреть ролик
            </button>
            <button class="button--gray">Подробнее</button>
          </div>
        </div>
      </div>
    </section>

    <section class="shop-types">
      <h1 class="cards-info__header centered">ГДЕ МОЖНО КУПИТЬ?</h1>
      <div class="shop-types__row">
        <div class="row-type">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/WB.png" alt="">
          <a href="#">Wildberries</a>
        </div>
        <div class="row-type">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Yandeks.png" alt="">
          <a href="#">ЯндексМаркет</a>
        </div>
        <div class="row-type">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Ozon.png" alt="">
          <a href="#">Ozon</a>
        </div>
      </div>

      <h2 class="centered">В наших магазинах на маркетплейсах, а также в универмаге подарков на нашем сайте</h2>
      <div class="button-container short-article-btn">
        <button class="button--green">УНИВЕРМАГ ПОДАРКОВ</button>
      </div>
    </section>

    <section class="support-section">
      <form class="support-form" action="">
        <input type="text" id="name" placeholder="Ваше имя" class="support-input">
        <input type="text" id="phone" placeholder="Телефон" class="support-input">
        <input type="text" id="email" placeholder="Почта" class="support-input">
        <input type="text" id="text" placeholder="Ваше сообщение" class="support-input">
        <button class="support-button">Отправить</button>
      </form>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/support-image.png" class="support-image"></img>
    </section>
    </div>

<?php get_footer(); ?>