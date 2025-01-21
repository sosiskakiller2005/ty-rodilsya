<?php get_header() ?>

        <main class="main-content">
            <article class="article-container">
                <div class="article-content">
                    <div class="article-image">
                        <img src="./assets/img/text-fon.png" alt="Видеооткрытки 1934">
                    </div>
                    <div class="article-description">
                        <h2>ВИДЕООТКРЫТКИ О 30-Х ГОДАХ</h2>
                        <p>
                            30-е годы — это время невиданного трудового энтузиазма: первых метростроевцев и стахановцев.
                            Герои страны — летчики, полярники, пограничники, знатные рабочие и колхозники. Неслучайно
                            именно
                            в это десятилетие учреждено звание Героя Советского Союза. На экраны страны выходят «Веселые
                            ребята» и «Чапаев», «Цирк» и «Волга-Волга», а настоящим символом отечественного кино
                            становится
                            Любовь Орлова — единственная и неповторимая.
                        </p>
                        <p>
                            Впервые проведены чемпионаты СССР по футболу и хоккею с мячом. Валерий Чкалов совершает
                            беспосадочный перелет Москва — Северный полюс — Ванкувер. Страна с размахом отмечает юбилей
                            Сталина. А под конец десятилетия начинается Вторая мировая война.
                        </p>
                        <div class="buttons">
                            <button onclick="watchVideo()">СМОТРЕТЬ РОЛИК</button>
                            <button id="buyBtn">РАЗВЕРНУТЬ ДЕСЯТИЛЕТИЕ</button>
                        </div>
                    </div>
                </div>
                <div class="hidden article-products" id="products">
                    <article class="product">
                        <div class="article-image">
                            <img src="./assets/img/card_list.jpg" alt="1939 год">
                        </div>
                        <p>1939 год</p>
                        <div class="product-info">
                            <p class="product-cost">420 руб.</p>
                            <p>DVD-открытка</p>
                        </div>
                        <div class="product-buttons">
                            <button href="#">Описание</button>
                            <button href="#" class="product-cart-button">
                                <img class="product-cart-icon" src="/assets/img/cart.png" alt="">
                            </button>
                        </div>
                    </article>
                    <article class="product">
                        <div class="article-image">
                            <img src="./assets/img/card_list.jpg" alt="1939 год">
                        </div>
                        <p>1939 год</p>
                        <div class="product-info">
                            <p class="product-cost">420 руб.</p>
                            <p>DVD-открытка</p>
                        </div>
                        <div class="product-buttons">
                            <button href="#">Описание</button>
                            <button href="#" class="product-cart-button">
                                <img class="product-cart-icon" src="/assets/img/cart.png" alt="">
                            </button>
                        </div>
                    </article>
                    <article class="product">
                        <div class="article-image">
                            <img src="./assets/img/card_list.jpg" alt="1939 год">
                        </div>
                        <p>1939 год</p>
                        <div class="product-info">
                            <p class="product-cost">420 руб.</p>
                            <p>DVD-открытка</p>
                        </div>
                        <div class="product-buttons">
                            <button href="#">Описание</button>
                            <button href="#" class="product-cart-button">
                                <img class="product-cart-icon" src="/assets/img/cart.png" alt="">
                            </button>
                        </div>
                    </article>
                </div>
            </article>
        </main>
    </div>

    <footer class="footer">
        <div class="footer-item">
            <a class="footer-item-link" href="#">- ФИЛЬМЫ ПО ГОДАМ</a>
            <a class="footer-item-link" href="#">- ФИЛЬМЫ К ПРАЗДНИКАМ</a>
            <a class="footer-item-link" href="#">- ИНДИВИДУАЛЬНОЕ ПРЕДЛОЖЕНИЕ</a>
        </div>
        <div class="footer-item">
            <a class="footer-item-link" href="#">- ОПТОВЫМ ПОКУПАТЕЛЯМ</a>
            <a class="footer-item-link" href="#">- КОРПОРАТИВНЫМ ЗАКАЗЧИКАМ</a>
            <a class="footer-item-link" href="#">- УНИВЕРМАН ПОДАРКОВ</a>
        </div>
        <div class="footer-copyright">
            <div>

            </div>

        </div>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>