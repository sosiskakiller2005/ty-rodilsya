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
                <a href="<?php echo get_permalink(19); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Логотип"
                        class="header__logo">
                </a>
            </div>
            <div class="header__right">
                <div class="header__social">
                </div>
                <nav class="header__nav">
                    <a href="<?php echo get_permalink(74); ?>" class="header__nav-item">Видеооткрытка с фильмами 1934 - 1994 год</a>
                    <a href="#" class="header__nav-item">Видеооткрытка с фильмами к праздникам</a>
                    <a href="#" class="header__nav-item">Индивидуальный проект</a>
                    <a href="#" class="header__nav-item">Оптовым покупателям</a>
                    <a href="#" class="header__nav-item">Корпоративным заказчикам</a>
                </nav>
                <a href="#" class="header__hamburger-btn">
                        <i class="fa-solid fa-bars"></i>
                </a>
                <ul class="menu">
                    <button id="closeBtn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <li><a href="<?php echo get_permalink(12); ?>">Личный кабинет (вход/регистрация)</a></li>
                    <li><a href="<?php echo get_permalink(74); ?>">Видеооткрытка с фильмами 1934 - 1994 год</a></li>
                    <li><a href="#services">Индивидуальный Проект</a></li>
                    <li><a href="#contact">Оптовым покупателям</a></li>
                    <li><a href="#contact">Корпоративным заказчикам</a></li>
                    <li><a href="#contact">Контакты</a></li>
                    </ul>
                <div class="header__login">
                <?php if (is_user_logged_in()): ?>
                    <a class="header_login-link" href="<?php echo get_permalink(14); ?>">Профиль</a>
                    <a class="header_login-link" href="<?php echo get_permalink(22); ?>">Корзина</a>
                    <a class="header_login-link" href="<?php echo wp_logout_url(home_url()); ?>">Выход</a>
                <?php else: ?>
                    <a href="#" class="header_login-link">У меня есть код. Смотреть онлайн</a>
                    <a href="<?php echo get_permalink(8); ?>" class="header_login-link">Регистрация покупателя</a>
                    <a href="<?php echo get_permalink(12); ?>" class="header_login-link">Вход</a>
                <?php endif; ?>
                </div>
            </div>
        </header>