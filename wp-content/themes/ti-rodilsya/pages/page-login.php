<?php
/*
Template Name: Шаблон страницы входа
*/
?>

<?php get_header(); ?>

<section class="section-login">
  <?php
      if (isset($_GET['login']) && $_GET['login'] == 'failed') {
          echo '<div class="error-message">Ошибка: Неправильный логин или пароль.</div>';
      }
      ?>
    <form class="login-form" method="post" action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>">
        <h2>Вход</h2>
        <p>Авторизуйтесь через социальные сети</p>
        <div class="login-socials">
            <?php echo do_shortcode('[miniorange_social_login shape="square" theme="default" space="4" size="35"]'); ?>
            <a class="social-link" href="#">
                <i class="fa-brands fa-odnoklassniki-square"></i>
            </a>
            <a class="social-link" href="#">
                <i class="fa-brands fa-vk"></i>
            </a>
        </div>

        <p>или используйте свой аккаут</p>
        <input type="text" name="log" id="username" placeholder="Введите почту" required>
        <input type="password" name="pwd" id="password" placeholder="Введите пароль" required>
        <a href="#">Забыли пароль?</a>
        <button name="wp-submit" id="wp-submit">Войти</button>
        <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url()); ?>">
    </form>

</div>

</section>
</div>

<?php get_footer(); ?>