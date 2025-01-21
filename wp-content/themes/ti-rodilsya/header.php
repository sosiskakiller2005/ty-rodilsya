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
        <header class="header">
            <div class="header__left">
                <a href="./index.html">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="Логотип" class="header__logo">
                </a>
            </div>
            <div class="header__right">
                <div class="header__social">
                </div>
                <nav class="header__nav">
                    <a href="#" class="header__nav-item">Видеооткрытка с фильмами 1934 - 1994 год</a>
                    <a href="#" class="header__nav-item">Видеооткрытка с фильмами к праздникам</a>
                    <a href="#" class="header__nav-item">Индивидуальный проект</a>
                    <a href="#" class="header__nav-item">Оптовым покупателям</a>
                    <a href="#" class="header__nav-item">Корпоративным заказчикам</a>
                </nav>
                <div class="header__login">
                    <a href="#" class="header_login-link">У меня есть код. Смотреть онлайн</a>
                    <a href="./page-registration.html" class="header_login-link">Регистрация покупателя</a>
                    <a href="./page-login.html" class="header_login-link">Вход</a>
                </div>
            </div>
        </header>