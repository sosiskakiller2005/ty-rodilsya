<?php
/*
Template Name: Шаблон страницы регистрации
*/
?>

<?php get_header(); ?>

    <main>
      <section class="shop-container">
        <div class="section-title">
          <h2>регистрация в личном кабинете</h2>
        </div>
        <div class="login-section">
          <h3 class="centered">Если вы уже зарегистрированы, пожалуйста, войдите в личный кабинет</h3>
          <div class="button-container">
            <button class="button--gray input--short">Войти в личный кабинет</button>
          </div>
          <h3 class="centered">пройти регистрацию с помощью</h3>
          <div class="socials">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/VkBlue.png" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/OkOr.png" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/YandeksRed.png" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Googl.png" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/TgBlue.png" alt="">
          </div>
          <input class="input" type="text" placeholder="E-mail" id="email">
          <input class="input" type="password" placeholder="Пароль" id="password">
          <div>
            <p>Пароль должен содержать:</p>
            <ul class="password-requirements">
              <li>Минимум 8 символов</li>
              <li>Должны быть латинские буквы</li>
              <li>Должны быть цифры</li>
            </ul>
          </div>
          <div class="button-container">
            <button class="button--gray input--short">зарегистрироваться</button>
          </div>
          <a href="" class="login-link">Политика конфиденциальности</a>
        </div>
      </section>
      </div>

<?php get_footer(); ?>