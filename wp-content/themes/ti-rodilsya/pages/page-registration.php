<?php
/*
Template Name: Шаблон страницы регистрации
*/
?>
<?php wp_head(); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_text_field($_POST['email']);
    $password = sanitize_text_field($_POST['password']);

    if(!username_exists($username) && !email_exists($email)){
        $user_id = wp_create_user($username, $password, $email);

        if ($user_id){
            echo '<p>Регистрация прошла успешно!</p>';
        } else {
            echo '<p>Ошибка при регистрации!</p>';
        }
    } else {
        echo '<p>Пользователь с такими данными уже существует</p>';
    }
}
?>

<section class="section-login">
    <form class="login-form" method="post">
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

        <p>или используйте свой аккаунт</p>
        <input type="text" name="username" id="username" placeholder="Введите имя" required>
        <div class="input-hint">
            <input type="text" name="email" id="email" placeholder="Введите почту" required>
            <p class="hint">На этот адрес будут отправляться уведомления о статусе заказа</p>
        </div>
        <div class="input-hint">
            <input type="password" name="password" id="password" placeholder="Введите пароль" required>
            <p class="hint">Назначьте пароль или мы сгенерируем его автоматически</p>
        </div>

        <div class="captcha">

        </div>
        <button>Зарегистрироваться</button>
    </form>
</section>
</div>