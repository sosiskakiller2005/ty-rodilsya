<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
    <title>Ты родился!</title>
</head>

<body>
    <div class="container">
    <header>
      <div class="header__container">
        <a href="<?php echo get_permalink(18); ?>">
          <img class="header__logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/LogoTyRod.png" alt="" />
        </a>
        <div class="header__container-right">
          <div class="header__contact-info">
            <div class="contact-info__phone">
              <h3 class="typography">+7 (915) 438-07-07</h3>
              <a class="header__call-link" href="">заказать обратный звонок</a>
            </div>
            <div class="header__socials">
              <a href="" class="header__social-link">
                <img src="../assets\img\icons\TgKor.png" alt="" />
              </a>
              <a href="" class="header__social-link">
                <img src="..\assets\img\icons\WatKor.png" alt="" />
              </a>
              <a href="" class="header__social-link">
                <img src="..\assets\img\icons\VkKor.png" alt="" />
              </a>
              <a href="" class="header__social-link">
                <img src="..\assets\img\icons\OKKor.png" alt="" />
              </a>
            </div>
          </div>
          <div class="nav-main">
            <nav class="header__nav">
              <a href="<?php echo get_permalink(28); ?>" class="header__menu-button">ВИДЕООТКРЫТКА С фильмами 1934 - 1994 год</a>
              <a href="<?php echo get_permalink(16); ?>" class="header__menu-button">ВИДЕООТКРЫТКА С фильмами к праздникам</a>
              <a href="<?php echo get_permalink(10); ?>" class="header__menu-button">Индивидуальный Проект</a>
              <a href="<?php echo get_permalink(26); ?>" class="header__menu-button">ОПТОВЫМ ПОКУПАТЕЛЯМ</a>
              <a href="<?php echo get_permalink(12); ?>" class="header__menu-button">Корпоративным заказчикам</a>
            </nav>
            <a href="<?php echo get_permalink(14); ?>" class="header__shop-link">Универмаг подарков</a>
          </div>
        </div>
      </div>
      <div class="header__nav-links">
        <a href="<?php echo get_permalink(24); ?>" class="header__nav-link">Регистрация</a>
        <a href="<?php echo get_permalink(20); ?>" class="header__nav-link">Вход в Личный кабинет</a>
        <a href="" class="header__nav-link">Контакты</a>
      </div>
      <div class="header__banner">
        <h1 class="header__banner-text">Все фильмы с возможностью онлайн просмотра</h1>
      </div>
    </header>