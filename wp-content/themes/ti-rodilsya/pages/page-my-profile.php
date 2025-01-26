<?php
/*
Template Name: Шаблон страницы профиля
*/
?>
<?php get_header(); ?>

<section class="profile-section">
    <nav class="profile-nav">
        <a class="profile-nav-link menu-link" href="/profile/my-orders" data-page="my-orders">Мои заказы</a>
        <span>></span>
        <a class="profile-nav-link menu-link" href="/profile/my-videos" data-page="my-videos">Мои электронные открытки</a>
        <span>></span>
        <a class="profile-nav-link menu-link" href="/profile/edit-profile" data-page="edit-profile">Редактировать профиль</a>
    </nav>
    <div class="profile-content" id="dynamic-content">
        
    </div>
</section>

</div>
<?php get_footer(); ?>