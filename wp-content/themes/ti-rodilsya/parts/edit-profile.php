<?php
/*
Template Name: Шаблон раздела редактирования профиля
*/
?>

<section class="edit-profile-section">
    <h3 class="edit-title">Ваши контактные данные</h3>
    <form action="" class="edit-form">
        <div class="input-group">
            <div class="group">
                <label for="name">Имя</label>
                <input type="text" id="name">
            </div>
            <p class="group-description">Используется для подписи в открытке</p>
        </div>
        <div class="input-group">
            <div class="group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone">
            </div>
            <p class="group-description">При необходимости наш менеджер позвонит вам для уточнения деталей заказа</p>
        </div>
        <div class="input-group">
            <div class="group">
                <label for="email">E-mail</label>
                <input type="email" id="email">
            </div>
            <p class="group-description">На эту почту отправляются электронные открытки для вас</p>
        </div>
        <div class="input-group">
            <div class="group">
                <label for="address">Адрес</label>
                <input type="text" id="address">
            </div>
            <p class="group-description">На этот адрес доставляются DVD-открытки для вас</p>
        </div>
        <button>Изменить пароль</button>
        <button>Сохранить изменения</button>
    </form>
</section>