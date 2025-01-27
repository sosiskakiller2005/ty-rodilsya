<?php
/*
Template Name: Шаблон раздела моих видеооткрыток
*/
?>

<section class="videos-section">
    <div class="input-code">
        <h3 class="input-title">У меня есть код на просмотр DVD-открытки</h3>
        <div class="input-block">
            <input class="add-code-input" id="codeInput" type="text" placeholder="Введите код">
            <button class="add-code-button" id="addCodeButton">Добавить</button>
        </div>
        <p class="input-code-message">
            Если у вас есть DVD-открытка с кодом, введите его в данное поле
        </p>
    </div>
    <div class="videos-list">
        <h3 class="videos-list-title">Мои электронные открытки</h3>
        <div class="videos">
            <?php
            $current_user = wp_get_current_user();
            $customer_orders = wc_get_orders(array(
                'customer_id' => $current_user->ID,
                'status'      => 'completed',
            ));

            if (empty($customer_orders)) {
                echo '<p>У вас нет добавленных открыток.</p>';
            } else {
                foreach ($customer_orders as $order) {
                    foreach ($order->get_items() as $item_id => $item) {
                        $product_id = $item->get_product_id();
                        $product = wc_get_product($product_id);
                        $video_link = get_post_meta($product_id, 'video_link', true);
                        ?>
                        <article class="video">
                            <img src="<?php echo esc_url(wp_get_attachment_url($product->get_image_id())); ?>" alt="Видеообложка" class="video-cover">
                            <div class="video-content">
                                <div class="content-main">
                                    <h3 class="content-title"><?php echo esc_html($product->get_name()); ?></h3>
                                    <span>
                                        <i class="fa-solid fa-circle-play"></i>
                                        <?php if ($video_link): ?>
                                            <a class="video-link" href="<?php echo esc_url($video_link); ?>" target="_blank">Получить ссылку на открытку</a>
                                        <?php else: ?>
                                            Видео не доступно.
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <p class="last-added-video">Добавлено только что</p>
                            </div>
                        </article>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</section>
