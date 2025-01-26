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
    //ajax
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/dynamic-content.js');
    wp_enqueue_script('dynamic-content', get_template_directory_uri() . '/assets/js/dynamic-content.js', array('jquery'), null, true);
    // Передаём URL для AJAX-запросов
    wp_localize_script('dynamic-content', 'ajaxurl', admin_url('admin-ajax.php'));
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
add_action('init', 'reset_user_capabilities');
?>