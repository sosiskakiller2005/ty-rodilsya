<?php

add_action( 'wp_enqueue_scripts', 'upload_scripts' );
add_filter('the_content', 'do_shortcode');

//Подключение динамического раздела
add_action('wp_ajax_load_dynamic_page', 'load_dynamic_page');
add_action('wp_ajax_nopriv_load_dynamic_page', 'load_dynamic_page');

//Для проверки шорткода


// add_action('init', function() {
//     if (shortcode_exists('miniorange_social_login')) {
//         echo 'Шорткод зарегистрирован!';
//     } else {
//         echo 'Шорткод не найден.';
//     }
// });
//


//Скрипт для загрузки динамического контента
function load_dynamic_page() {
    // Проверяем, передана ли страница
    if (isset($_POST['page'])) {
        $page = sanitize_text_field($_POST['page']);

        // В зависимости от переданного параметра подгружаем нужный шаблон
        switch ($page) {
            case 'my-orders':
                wp_redirect(get_permalink(98));
                exit;
                break;

            case 'my-videos':
                wp_redirect(get_permalink(100));
                exit;
                break;

            case 'edit-profile':
                wp_redirect(get_permalink(95));
                exit;
                break;

            default:
                echo 'Страница не найдена.';
                break;
        }
    } else {
        echo 'Ошибка: страница не указана.';
    }

    wp_die(); // Останавливаем выполнение скрипта
}


function upload_scripts() {
	wp_enqueue_style( 'main', get_stylesheet_uri() );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/all.css' );
	wp_enqueue_style( 'tablet-hor-style', get_template_directory_uri() . '/assets/css/tablet-hor-style.css' );
	wp_enqueue_script( 'wrap', get_template_directory_uri() . '/assets/js/wrap.js');
	wp_enqueue_script( 'add_product_by_code_script', get_template_directory_uri() . '/assets/js/add-product-by-code-script.js');
	wp_enqueue_script( 'dynamic-content', get_template_directory_uri() . '/assets/js/dynamic-content.js');
	wp_enqueue_script( 'gift-ideas-slider', get_template_directory_uri() . '/assets/js/gift-ideas-slider.js');
	wp_enqueue_script( 'slider', get_template_directory_uri() . '/assets/js/slider.js');
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js');
	wp_enqueue_script( 'tv-switcher', get_template_directory_uri() . '/assets/js/tv-switcher.js');
    // Передаём URL для AJAX-запросов
    wp_localize_script('dynamic_content_script', 'ajax_object', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}

function reset_user_capabilities() {
    $role = get_role('administrator');
    if ($role) {
        $role->add_cap('edit_pages');
        $role->add_cap('edit_others_pages');
        $role->add_cap('publish_pages');
        $role->add_cap('delete_pages');
    }
}

function add_video_link_meta_box() {
    add_meta_box(
        'video_link_meta_box',
        'Видео для товара',
        'render_video_link_meta_box',
        'product',
        'side'
    );
}
add_action('add_meta_boxes', 'add_video_link_meta_box');

function render_video_link_meta_box($post) {
    $video_link = get_post_meta($post->ID, 'video_link', true);
    ?>
    <p>
        <input type="text" id="video_link" name="video_link" value="<?php echo esc_attr($video_link); ?>" style="width: 100%;" placeholder="URL видео">
    </p>
    <p>
        <button type="button" class="button upload-video-button">Выбрать видео</button>
    </p>
    <script>
        jQuery(document).ready(function($) {
            $('.upload-video-button').on('click', function(e) {
                e.preventDefault();
                var frame = wp.media({
                    title: 'Выберите видео',
                    button: {
                        text: 'Выбрать'
                    },
                    library: {
                        type: 'video'
                    },
                    multiple: false
                });
                frame.on('select', function() {
                    var attachment = frame.state().get('selection').first().toJSON();
                    $('#video_link').val(attachment.url);
                });
                frame.open();
            });
        });
    </script>
    <?php
}

function auto_assign_video_link_to_product($post_id, $post, $update) {
    // Проверяем, что это товар
    if ($post->post_type !== 'product') {
        return;
    }

    // Проверяем, не это ли автосохранение
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Проверяем, есть ли права на редактирование
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Пример логики: просто устанавливаем пустое значение в meta, чтобы не было ошибки
    update_post_meta($post_id, 'video_link', '');
}

function save_video_link_meta($post_id) {
    if (isset($_POST['video_link'])) {
        update_post_meta($post_id, 'video_link', sanitize_text_field($_POST['video_link']));
    }
}

//Загрузка медиафайлов
add_action('save_post', 'auto_assign_video_link_to_product', 10, 3);
add_action('save_post', 'save_video_link_meta');

//Код для генерации уникальных ссылок на товары

// Функция для генерации случайного уникального кода
function generate_unique_code() {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $code = '';

    // Генерация первой части
    for ($i = 0; $i < 6; $i++) {
        $code .= $chars[rand(0, strlen($chars) - 1)];
    }

    $code .= '-';

    // Генерация второй части
    for ($i = 0; $i < 6; $i++) {
        $code .= $chars[rand(0, strlen($chars) - 1)];
    }

    return $code;
}

// Функция для сохранения уникального кода новому товару
function assign_unique_code_to_product($post_id) {
    // Проверяем, что это тип поста "product" (WooCommerce)
    if (get_post_type($post_id) !== 'product') {
        return;
    }

    // Проверяем, чтобы код не перезаписывался для существующих товаров
    $existing_code = get_post_meta($post_id, 'character_code', true);
    if (!empty($existing_code)) {
        return;
    }

    // Генерируем уникальный код
    $unique_code = generate_unique_code();

    // Сохраняем код в метаполе товара
    update_post_meta($post_id, 'character_code', $unique_code);
}

// Привязываем функцию к хуку создания нового товара
add_action('woocommerce_new_product', 'assign_unique_code_to_product');

// Обработчик для добавления товара по коду
function add_product_by_code() {
    // Проверяем, что код был передан
    if (!isset($_POST['code']) || empty($_POST['code'])) {
        wp_send_json_error(['message' => 'Код не указан.']);
    }

    $code = sanitize_text_field($_POST['code']);

    // Логирование запроса для отладки
    error_log('Получен код: ' . $code);

    // Проверяем, есть ли товар с таким кодом
    $product_query = new WP_Query([
        'post_type'  => 'product',
        'meta_query' => [
            [
                'key'   => 'character_code',
                'value' => $code,
                'compare' => '='
            ]
        ]
    ]);

    if (!$product_query->have_posts()) {
        wp_send_json_error(['message' => 'Товар с таким кодом не найден.']);
    }

    $product = $product_query->posts[0]; // Получаем первый найденный товар
    $product_id = $product->ID;

    // Получаем текущего пользователя
    $user_id = get_current_user_id();
    if (!$user_id) {
        wp_send_json_error(['message' => 'Вы не авторизованы.']);
    }

    // Создаем заказ через WooCommerce
    $order = wc_create_order();
    $order->set_customer_id($user_id);
    $order->add_product(wc_get_product($product_id), 1);
    $order->set_status('completed'); // Меняем статус на "Обрабатывается"
    $order->update_meta_data('order_source', 'Добавлен через ввод кода');
    $order->calculate_totals();

    wp_send_json_success(['message' => 'Заказ успешно создан!']);
}

add_action('wp_ajax_add_product_by_code', 'add_product_by_code');
add_action('wp_ajax_nopriv_add_product_by_code', 'add_product_by_code');


//отправка письма
function send_email_action(){
        $current_user = wp_get_current_user();
        // Адрес получателя
        $user_email = $current_user->user_email;
        echo ($user_email);
        // echo ($user_email);
        
        // Тема письма
        $subject = 'Коды для виедооткрыток: ';
        
        // Содержимое письма
        $message = 'Ваши коды: ';
        
        $cart_items = WC()->cart->get_cart();

        if (!empty($cart_items)) {
            foreach ($cart_items as $cart_item) {
                $product_id = $cart_item['product_id'];
                $character_code = get_post_meta($product_id, 'character_code', true);
                $product_name = get_the_title($product_id);
                $message .= "Товар: {$product_name} - Код: " . ($character_code ?: 'Нет кода') . " ";
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
        wp_die();
    }
    add_action('wp_ajax_send_email_action', 'send_email_action');

add_action('init', 'reset_user_capabilities');
add_action('plugins_loaded', function () {
    if (!is_textdomain_loaded('complianz-gdpr')) {
        load_plugin_textdomain('complianz-gdpr', false, WP_LANG_DIR . '/plugins/complianz-gdpr/');
    }
    if (!is_textdomain_loaded('complianz-terms-conditions')) {
        load_plugin_textdomain('complianz-terms-conditions', false, WP_LANG_DIR . '/plugins/complianz-terms-conditions/');
    }
});
?>