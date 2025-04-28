<?php
/*
Template Name: Шаблон страницы входа
*/
?>

<?php get_header(); ?>

    <main>
      <section class="shop-container">
        <div class="section-title">
          <h2>ВХОД В ЛИЧНЫЙ КАБИНЕТ</h2></div>
        <div class="login-section">
          <h3 class="centered">вы здесь в первый раз?</h3>
          <div class="button-container">
            <button class="button--gray input--short">
              зарегистрироваться
            </button>
          </div>
          <h3 class="centered">войдите в личный кабинет с помощью</h3>
          <div class="socials">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/VkBlue.png" alt="" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/OkOr.png" alt="" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/YandeksRed.png" alt="" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Googl.png" alt="" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/TgBlue.png" alt="" />
          </div>
          <input type="text" placeholder="Ваше имя или e-mail" class="input" />
          <input type="password" placeholder="Пароль" class="input" />
          <div class="button-container">
            <button class="button--gray input--short">
              Войти в личный кабинет
            </button>
          </div>
          <a href="reset-password-page.html" class="login-link">Забыли пароль?</a>
          <a href="" class="login-link">Политика конфиденциальности</a>
        </div>
      </section>
      </div>

<?php get_footer(); ?>