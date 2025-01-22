<?php
/*
Template Name: Шаблон страницы регистрации
Template Post Type: page
*/
?>
<?php wp_head(); ?>


<section class="section-login">
    <form class="login-form">
        <h2>Регистрация</h2>
        <p>Авторизуйтесь через социальные сети</p>
        <div class="login-socials">
            <a class="social-link" href="#">
                <i class="fa-brands fa-odnoklassniki-square"></i>
            </a>
            <a class="social-link" href="#">
                <i class="fa-brands fa-vk"></i>
            </a>
        </div>

        <p>или используйте свой аккаут</p>
        <input type="text" name="" id="" placeholder="Введите имя">
        <div class="input-hint">
            <input type="text" name="" id="" placeholder="Введите почту">
            <p class="hint">На этот адрес будут отправляться уведомления о статусе заказа</p>
        </div>
        <div class="input-hint">
            <input type="password" name="" id="" placeholder="Введите пароль">
            <p class="hint">Назначьте пароль или мы сгенерируем его автоматически</p>
        </div>

        <div class="captcha">

        </div>
        <button>Зарегистрироваться</button>
    </form>
</section>
</div>