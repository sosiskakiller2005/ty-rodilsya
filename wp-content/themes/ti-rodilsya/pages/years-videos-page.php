<?php
/*
Template Name: Шаблон страницы видеооткрыток по годам
*/
?>

<?php
// Подключаем WordPress для работы с функциями WooCommerce
include 'wp-load.php';

// Получаем товары с помощью WP_Query
$args = [
    'post_type' => 'product',          // Тип записи: товары
    'posts_per_page' => -1,           // Количество товаров (-1 для всех)
    'tax_query' => [
        [
            'taxonomy' => 'product_cat', // Таксономия WooCommerce для категорий товаров
            'field' => 'slug',          // Используем слаг категории
            'terms' => 'videootkritka-s-filmami-1934-1994-gg',   // Слаг категории (замените на свой)
        ],
    ],
];

$products_query = new WP_Query($args);
?>

<?php get_header(); ?>


<main>
    <section class="shop-container">
        <div class="section-title">
            <h2>ВИДЕООТКРЫТКА С ФИЛЬМАМИ, 1934–1994 ГГ.</h2>
        </div>

        <article class="years-videos">
            <div class="years-search">
                <h3 class="years-search-header">Поиск по десятилетиям:</h3>
                <div class="years">
                    <h3><a href="">1934-1939</a></h3>
                    |
                    <h3><a href="">1940-1949</a></h3>
                    |
                    <h3><a href="">1950-1959</a></h3>
                    |
                    <h3><a href="">1960-1969</a></h3>
                    |
                    <h3><a href="">1970-1979</a></h3>
                    |
                    <h3><a href="">1980-1989</a></h3>
                    |
                    <h3><a href="">1990-1994</a></h3>
                </div>
            </div>
        </article>

        <article class="tv-section">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Televizor.png" alt="" />
            <article class="about-us">
                <p>
                    На день рождения близкого человека, друга, коллеги, на юбилей
                    свадьбы или любую другую памятную дату Вы можете подарить
                    оригинальный и необычный подарок! Фильм о любом годе с 1934 по
                    1994 подарит положительные эмоции, вызовет улыбку и надолго
                    останется в памяти.
                </p>
                <p>
                    Все наши фильмы наполнены добротой и интересными фактами. Они
                    трогают до глубины души и вызывают теплые эмоции! Каждое
                    десятилетие в наших фильмах – особенное! Мы с приятной
                    ностальгией погружаемся в историю. Выбираем важнейшие, ярчайшие
                    моменты прошлых лет – ведь именно они так дороги нам. Это наша
                    память и история.
                </p>
            </article>
        </article>

        <article class="videos-decades">
            <div class="article-container">
                <div class="decade-article">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/1934.png" alt="">
                    <div class="decade-info">
                        <h2>ВИДЕООТКРЫТКИ О 30-Х ГОДАХ</h2>
                        <p>
                            30-е годы – это время невиданного трудового энтузиазма: первых метростроевцев и стахановцев.
                            Герои
                            страны – летчики, полярники, пограничники,
                            знатные рабочие и колхозники. Неслучайно именно в это десятилетие учреждено звания Героя
                            Советского
                            Союза. На экраны страны выходят «Веселые ребята» и
                            «Чапаев», «Цирк» и «Волга-Волга», а настоящим символом отечественного кино становится Любовь
                            Орлова –
                            единственная и неподражаемая. Впервые проведены
                            чемпионаты СССР по футболу и хоккею с мячом. Валерий Чкалов совершает беспосадочный перелет
                            Москва –
                            Северный полюс – Ванкувер. Страна с размахом отмечает
                            юбилей Сталина. А под конец десятилетия начинается Вторая мировая война.
                        </p>
                        <div class="button-container-short">
                            <button class="button--gray article-btn unwrap-btn">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Tv-brown.png"
                                    alt="">СМОТРЕТЬ РОЛИК
                            </button>
                            <button class="button--gray article-btn unwrap-btn">Развернуть десятилетие</button>
                        </div>
                    </div>
                </div>
                <div class="products hidden">
                    <?php if ($products_query->have_posts()): ?>
                    <?php while ($products_query->have_posts()): $products_query->the_post(); ?>
                    <?php
                            $product_id = get_the_ID();
                            $product = wc_get_product($product_id); // Получаем объект товара
                            $product_price = $product->get_price(); // Цена товара
                            $product_url = get_permalink($product_id); // Ссылка на товар
                            $product_image_id = $product->get_image_id(); // ID изображения
                            $product_image_url = wp_get_attachment_url($product_image_id); // URL изображения
                            ?>
                    <article class="products-item">
                        <div class="article-image">
                            <img src="<?php echo esc_url($product_image_url); ?>" alt="">
                        </div>

                        <p>
                            <?php echo esc_html($product->get_name()); ?>
                        </p>
                        <p class="green">
                            <?php echo esc_html($product_price); ?> руб.
                        </p>
                        <div class="button-container">
                            <a class="button--gray"
                                href="<?php echo esc_url(get_permalink(84) . '?id=' . $product_id); ?>">
                                Описание</a>
                            <a class="button--gray" href="?add-to-cart=<?php echo $product_id; ?>">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </article>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else: ?>
                    <li>Товары не найдены.</li>
                    <?php endif; ?>
                </div>
            </div>

            <div class="article-contrainer">
                <div class="decade-article">
                    <img src="<?php echo get_template_directory_uri(); ?>./assets/img/pictures/1940.png" alt="">
                    <div class="decade-info">
                        <h2>ВИДЕООТКРЫТКИ О 40-Х ГОДАХ</h2>
                        <p>
                            40-е годы – одна из самых трагичных страниц в летописи нашей страны и во всей истории
                            человечества. Вторая мировая война разрушительным ураганом прошлась по десяткам стран и
                            миллионам человеческих судеб. Но именно Советский Союз, как бы сейчас ни извращали историю,
                            стал героической силой, которая остановила фашизм. Наша страна, совершив один подвиг –
                            военный,
                            вынуждена проявить не меньше героизма для восстановления собственной экономики, подорванной
                            затяжной и разрушительной войной. В 40-е на дорогах страны увидят новые «Москвичи» и
                            «Победы».
                            На экраны выйдут ставшие позже киноклассикой «Кубанские казаки», «Небесный тихоход» и
                            «Золушка».
                            А Москва отметит 800-летний юбилей, во время которого будут заложены знаменитые «сестры» –
                            сталинские высотки столицы.
                        </p>
                        <div class="button-container-short">
                            <button class="button--gray article-btn">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Tv-brown.png"
                                    alt="">СМОТРЕТЬ РОЛИК
                            </button>
                            <button class="button--gray article-btn">Развернуть десятилетие</button>
                        </div>
                    </div>
                </div>
                <div class="products hidden">asd</div>
            </div>

            <div class="decade-article">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/1950.png" alt="">
                <div class="decade-info">
                    <h2>ВИДЕООТКРЫТКИ О 50-Х ГОДАХ</h2>
                    <p>
                        В 1950-х наша страна вступает в новую жизнь, без «отца народов» Иосифа Сталина. Начинается
                        хрущевская
                        оттепель: развенчание культа личности,
                        реабилитация политических заключенных, ослабление цензуры – в 50-е это воспринималось настоящим
                        глотком
                        свободы. В СССР идет масштабная стройка –
                        восстановление после Великой Отечественной войны. Создаются десятки новых заводов, вокруг
                        которых
                        начинают вырастать целые города. Спущен на воду первый
                        в мире атомный ледокол «Ленин». Состоялся запуск первого искусственного спутника Земли.
                        Геополитическая
                        ситуация в мире остается напряженной: СССР и
                        США проводят ряд ядерных испытаний, на Кубе в результате революции к власти приходит Фидель
                        Кастро, а в
                        Азии разгорается война между Южной и Северной
                        Кореей.
                    </p>
                    <div class="button-container-short">
                        <button class="button--gray article-btn">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Tv-brown.png"
                                alt="">СМОТРЕТЬ РОЛИК
                        </button>
                        <button class="button--gray article-btn">Развернуть десятилетие</button>
                    </div>
                </div>
            </div>

            <div class="decade-article">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/1960.png" alt="">
                <div class="decade-info">
                    <h2>ВИДЕООТКРЫТКИ О 60-Х ГОДАХ</h2>
                    <p>
                        1960-е – время новых, захватывающих открытий и политических перемен. В этом десятилетии
                        прозвучало
                        гагаринское «Поехали!», Алексей Леонов первым вышел
                        в открытый космос, а через несколько лет Нил Армстронг шагнул на поверхность Луны.
                    </p>
                    <p>
                        В СССР завершается хрущевская оттепель. К власти приходит Леонид Брежнев. Страна отмечает
                        50-летие
                        Октябрьской революции, наша сборная – чемпионы Европы
                        по футболу, Леонид Гайдай открывает зрителям знаменитую троицу Никулин – Вицин – Моргунов, а
                        Ту-144
                        первым в истории из пассажирских авиалайнеров
                        преодолевает звуковой барьер.
                    </p>
                    <div class="button-container-short">
                        <button class="button--gray article-btn">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Tv-brown.png"
                                alt="">СМОТРЕТЬ РОЛИК
                        </button>
                        <button class="button--gray article-btn">Развернуть десятилетие</button>
                    </div>
                </div>
            </div>

            <div class="decade-article">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/1970.png" alt="">
                <div class="decade-info">
                    <h2>ВИДЕООТКРЫТКИ О 70-Х ГОДАХ</h2>
                    <p>
                        1970-е входят в историю как эпоха разрядки международной напряженности. Возобновляются
                        советско-американские встречи на высшем уровне. Подписаны
                        исторические договоры об ограничении стратегических вооружений.
                    </p>
                    <p>
                        Первые метры на поверхности нашего естественного спутника преодолевает советский «Луноход».
                        Стыковка
                        кораблей «Союз» – «Аполлон» открывает новую эру
                        совместных международных космических исследований. Всесоюзная стройка Байкало-Амурской
                        магистрали
                        объединяет тысячи людей со всех уголков нашей страны.
                        В Тольятти с конвейера сходит первая «копейка» – ВАЗ-2101.
                    </p>
                    <div class="button-container-short">
                        <button class="button--gray article-btn">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Tv-brown.png"
                                alt="">СМОТРЕТЬ РОЛИК
                        </button>
                        <button class="button--gray article-btn">Развернуть десятилетие</button>
                    </div>
                </div>
            </div>

            <div class="decade-article">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/1980.png" alt="">
                <div class="decade-info">
                    <h2>ВИДЕООТКРЫТКИ О 80-Х ГОДАХ</h2>
                    <p>
                        80-е – годы серьезных перемен на политической карте мира. После брежневской «эпохи застоя» СССР
                        вступает
                        в новую эру: Михаил Горбачев, объявив
                        перестройку, кардинально меняет вектор развития страны. К концу десятилетия начнется массовое
                        падение
                        коммунистических режимов в странах Восточной
                        Европы. В Москву приходит летняя Олимпиада-80, а вместе с ней – небывалый наплыв иностранных
                        туристов.
                        Страна постепенно открывает железный занавес.
                        Состоялся запуск первых модулей орбитальной станции «Мир». В США начата космическая программа
                        Спейс
                        Шаттл, а в Советском Союзе проходят испытания
                        «Бурана» – космического корабля многоразового использования.
                    </p>
                    <div class="button-container-short">
                        <button class="button--gray article-btn">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Tv-brown.png"
                                alt="">СМОТРЕТЬ РОЛИК
                        </button>
                        <button class="button--gray article-btn">Развернуть десятилетие</button>
                    </div>
                </div>
            </div>

            <div class="decade-article">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/1990.png" alt="">
                <div class="decade-info">
                    <h2>ВИДЕООТКРЫТКИ О 90-Х ГОДАХ</h2>
                    <p>
                        В 90-е с карты мира исчезают многие страны: ГДР, Югославия, Чехословакия. Последним это
                        десятилетие
                        становится и для Советского Союза. Вместо него теперь
                        15 независимых государств.
                        В России новая Конституция, флаг и гимн. Президент Ельцин, стоящий на танке, - символ эпохи.
                        Страна
                        победившей демократии распахивает двери первому
                        "Макдональдсу". Обваливает в десятки раз цены на важнейшие продукты. 
                        Наводнён рынок ценных бумаг удивительной бумажкой - ваучером. Прилавки магазинов наполнены
                        диковинным до
                        сих пор иностранным алкоголем. Главный герой
                        телерекламы - Леня Голубков.
                    </p>
                    <div class="button-container-short">
                        <button class="button--gray article-btn">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Tv-brown.png"
                                alt="">СМОТРЕТЬ РОЛИК
                        </button>
                        <button class="button--gray article-btn">Развернуть десятилетие</button>
                    </div>
                </div>
            </div>
        </article>
    </section>


    <div class="banner">
        Все фильмы с возможностью онлайн просмотра
    </div>

    <section class="product-categories">
        <div class="category">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/IlektrOtkr.png" alt="">
            <div class="category__info">
                <p>Наша электронная видеооткрытка поможет вам поздравить ваших любимых и друзей.
                    Также дополнительно Вы можете написать поздравление и пожелание в самой электронной видеооткрытке,
                    отправить её имениннику.
                    Одаряемый получит электронную видеооткрытку, прочтет поздравление и посмотрит фильм, который Вы
                    подарили.
                    Фильм будет храниться в личном кабинете
                    именинника и постоянно доступен к просмотру.</p>
                <div class="button-container">
                    <button class="button--gray">
                        ПОДРОБНЕЕ
                    </button>
                </div>
            </div>
        </div>
        <div class="category">

            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Naborik.png" alt="" />
            <div class="category__info">
                <p>Каждый из нас заслуживает особенного внимания, особенно когда приближается день рождения.
                    И если Вы или Ваш близкий человек юбиляр, то у нас есть для Вас уникальный подарок.
                    Представляем Вашему вниманию подарочный набор, который не просто порадует, но и перенесет именинника
                    в
                    эпоху своего детства - видеооткрытка,
                    ручка со стилусом в подарочной коробке + небольшой презент. Именно поэтому мы создали подарочный
                    набор,
                    который отражает дух времени.</p>
                <div class="button-container">
                    <button class="button--gray" id="watch-video-btn">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/Tv-brown.png"
                            alt="">СМОТРЕТЬ РОЛИК
                    </button>
                    <button class="button--gray">
                        ПОДРОБНЕЕ
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="shop-types">

        <h1 class="cards-info__header centered">ГДЕ МОЖНО КУПИТЬ?</h1>
        <div class="shop-types__row">
            <div class="row-type">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/WB.png" alt="">
                <a href="">Wildberries</a>
            </div>
            <div class="row-type">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Yandeks.png" alt="">
                <a href="">ЯндексМаркет</a>
            </div>
            <div class="row-type">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Ozon.png" alt="">
                <a href="">Ozon</a>
            </div>
        </div>

        <h3>В наших магазинах на маркетплейсах, а также в универмаге подарков на нашем сайте</h3>
        <div class="button-container" id="shop-type-button">
            <button class="button--green">УНИВЕРМАГ ПОДАРКОВ</button>
        </div>
    </section>

    <section class="support-section">
        <form class="support-form" action="">
            <input type="text" id="name" placeholder="Ваше имя" class="support-input">
            <input type="text" id="phone" placeholder="Телефон" class="support-input">
            <input type="text" id="email" placeholder="Почта" class="support-input">
            <input type="text" id="text" placeholder="Ваше сообщение" class="support-input">
            <button class="support-button">Отправить</button>
        </form>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pictures/Voprosi.png" alt="">
    </section>
    </div>

    <?php get_footer(); ?>