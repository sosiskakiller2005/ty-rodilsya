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
	wp_enqueue_style( 'mediaquery', get_template_directory_uri() . '/assets/css/media.css' );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js');
	wp_enqueue_script( 'add_product_by_code_script', get_template_directory_uri() . '/assets/js/add-product-by-code-script.js');
	wp_enqueue_script( 'dynamic_content_script', get_template_directory_uri() . '/assets/js/dynamic-content.js');
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
    // Проверяем, что это AJAX-запрос
    if (!isset($_POST['code'])) {
        wp_send_json_error(['message' => 'Код не указан.']);
    }

    $code = sanitize_text_field($_POST['code']);

    // Ищем товар с указанным character_code
    $args = [
        'post_type' => 'product',
        'posts_per_page' => 1,
        'meta_query' => [
            [
                'key' => 'character_code', // Поле, где хранится код
                'value' => $code,
                'compare' => '=',
            ],
        ],
    ];

    $products = get_posts($args);

    if (empty($products)) {
        wp_send_json_error(['message' => 'Товар с таким кодом не найден.']);
    }

    $product_id = $products[0]->ID;

    $order = wc_create_order();
    if (is_wp_error($order)) {
        wp_send_json_error(['message' => 'Ошибка при создании заказа.']);
    }
    $order->add_product(wc_get_product($product_id), 1);
    $order->calculate_totals();
    wp_send_json_success(['message' => 'Товар добавлен в заказ.']);
}

add_action('wp_ajax_add_product_by_code', 'add_product_by_code');
add_action('wp_ajax_nopriv_add_product_by_code', 'add_product_by_code');

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