<?php
/*
Template Name: Шаблон страницы магазина
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
            'terms' => 'videootkrytki-o-80-h-godah',   // Слаг категории (замените на свой)
        ],
    ],
];

$products_query = new WP_Query($args);
?>

<?php get_header(); ?>

<article class="article-container">
    <div class="article-content">
        <div class="article-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/text-fon.png" alt="Видеооткрытки 1934">
        </div>
        <div class="article-description">
            <h2>ВИДЕООТКРЫТКИ О 80-Х ГОДАХ</h2>
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
        <article class="product">
            <div class="article-image">
                <img src="<?php echo esc_url($product_image_url); ?>" alt="">
            </div>

            <p>
                <?php echo esc_html($product->get_name()); ?>
            </p>
            <p>
                <?php echo esc_html($product_price); ?> руб.
            </p>
            <div class="product-buttons">
                <a class="product-button"
                    href="<?php echo esc_url(get_permalink(get_page_by_path('product')) . '?id=' . $product_id); ?>">
                    Описание</a>
                <a class="product-button" href="?add-to-cart=<?php echo $product_id; ?>">
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
</article>
</div>

<?php get_footer(); ?>
