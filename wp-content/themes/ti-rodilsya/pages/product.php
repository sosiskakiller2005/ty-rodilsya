<?php 
/*
Template Name: Шаблон описания продукта
*/
?>

<?php
// Подключаем WordPress и WooCommerce
include 'wp-load.php';

// Получаем ID товара из URL
$product_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Проверяем, существует ли товар
$product = wc_get_product($product_id);
if (!$product) {
    echo "Товар не найден.";
    exit;
}
?>

<?php get_header(); ?>


<section class="single-product">
    <h2><?php echo esc_html($product->get_name()); ?></h2>
    <div class="single-product-content">
        <img src="<?php echo esc_url(wp_get_attachment_url($product->get_image_id())); ?>" alt="">
        <div class="product-right">
            <p>Описание <?php echo wpautop($product->get_description()); ?></p>
            <div class="single-product-button">
                <p><strong>Цена:</strong> <?php echo esc_html($product->get_price()); ?> руб.</p>
                <form action="" method="post">
                    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product_id); ?>">
                    <button type="submit" class="product-button">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>В корзину</span></button>
                </form>
            </div>
        </div>
    </div>
</section>
</div>

<?php get_footer(); ?>