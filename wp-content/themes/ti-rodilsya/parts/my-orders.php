<?php
/*
Template Name: Шаблон раздела моих заказов
*/
?>

<section class="orders-section">
    <ul class="orders-list">

        <?php
            $current_user = wp_get_current_user();
            $customer_orders = wc_get_orders(array(
                'customer_id' => $current_user->ID
            ));

            if (empty($customer_orders)) {
                echo '<p>У вас пока нет заказов.</p>';
            } else {
                foreach ($customer_orders as $order) {
                    foreach ($order->get_items() as $item_id => $item) {
                        $product_id = $item->get_product_id();
                        $product = wc_get_product($product_id);
                        $video_link = get_post_meta($product_id, 'video_link', true);
                        ?>
                            <li class="order-item">
                                <p class="order-date">
                                    <?php echo date_i18n('d.m.Y', strtotime($order->get_date_created())); ?>
                                </p>
                                <span>|</span>
                                <p class="order-number">Заказ №<?php echo esc_html($order->get_order_number()); ?></p>
                                <span>|</span>
                                <p class="order-status">
                                    <?php echo esc_html(wc_get_order_status_name($order->get_status())); ?>
                                </p>
                            </li>
                        <?php
                    }
                }
            }
            ?>
    </ul>
</section>


