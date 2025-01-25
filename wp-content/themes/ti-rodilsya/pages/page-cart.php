<?php
/*
Template Name: Шаблон корзины
*/
?>
<?php
// Подключаем WordPress и WooCommerce
include 'wp-load.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    // Обновляем количество товаров в корзине
    foreach ($_POST['cart'] as $cart_item_key => $values) {
        $quantity = isset($values['qty']) ? (int)$values['qty'] : 0;
        if ($quantity > 0) {
            WC()->cart->set_quantity($cart_item_key, $quantity, true);
        }
    }

    // Перенаправляем пользователя на ту же страницу, чтобы избежать повторного отправления формы
    wp_redirect(esc_url(wc_get_cart_url()));
    exit;
}

// Получаем содержимое корзины
$cart = WC()->cart->get_cart();
?>


<?php get_header(); ?>

<section class="cart-containter">
    <h1>Корзина</h1>

    <?php if (!empty($cart)): ?>
    <form class="cart" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
        <table class="cart-products">
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total = 0; // Общая стоимость корзины
                    foreach ($cart as $cart_item_key => $cart_item):
                        $product = $cart_item['data']; // Объект товара
                        $quantity = $cart_item['quantity']; // Количество товара
                        $price = $product->get_price(); // Цена товара
                        $subtotal = $price * $quantity; // Сумма для позиции
                        $total += $subtotal; // Суммируем общую стоимость
                    ?>
                <tr>
                    <td>
                        <a
                            href="<?php echo esc_url(get_permalink(get_page_by_path('product')) . '?id=' . $product->get_id()); ?>">
                            <?php echo esc_html($product->get_name()); ?>
                        </a>
                    </td>
                    <td><?php echo esc_html($price); ?> руб.</td>
                    <td>
                        <input type="number" name="cart[<?php echo esc_attr($cart_item_key); ?>][qty]"
                            value="<?php echo esc_attr($quantity); ?>" min="1" style="width: 60px;">
                    </td>
                    <td><?php echo esc_html($subtotal); ?> руб.</td>
                    <td>
                        <a href="<?php echo esc_url(wc_get_cart_remove_url($cart_item_key)); ?>">Удалить</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><strong>Итого:</strong> <?php echo $total; ?> руб.</p>

        <button type="submit" name="update_cart" value="Обновить корзину">Обновить корзину</button>
        <a href="<?php echo esc_url(wc_get_checkout_url()); ?>">Перейти к оформлению</a>
    </form>
    <?php else: ?>
    <p>Ваша корзина пуста.</p>
    <a href="<?php echo get_permalink(74); ?>">Вернуться в магазин</a>
    <?php endif; ?>
</section>
</div>

<?php get_footer(); ?>