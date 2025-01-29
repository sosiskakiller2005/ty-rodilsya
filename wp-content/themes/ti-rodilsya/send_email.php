<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';
        $current_user = wp_get_current_user();
        // Адрес получателя
        $user_email = $current_user->user_email;
        echo ($user_email);
        // echo ($user_email);
        
        // Тема письма
        $subject = 'Коды для виедооткрыток: ';
        
        // Содержимое письма
        $message = 'Ваши коды:\n\n';
        
        $cart_items = WC()->cart->get_cart();

        if (!empty($cart)) {
            foreach ($cart as $cart_item) {
                $product_id = $cart_item['product_id'];
                $character_code = get_post_meta($product_id, 'character_code', true);
                $product_name = get_the_title($product_id);
                $message .= "Товар: {$product_name} - Код: " . ($character_code ?: 'Нет кода') . "\n";
            }
        } else {
            $message .= "Ваша корзина пуста.\n";
        }
        
        // Заголовки письма
        $headers[] = 'From: Ты родился! <
        info@xn--80aae4a1bi2b.ru
        >';
        
        // Отправка письма
        $result = wp_mail($user_email, $subject, $message, $headers);
        
        if ($result) {
            echo 'Письмо успешно отправлено!';
        } else {
            echo 'Ошибка при отправке письма.';
        }
        ?>