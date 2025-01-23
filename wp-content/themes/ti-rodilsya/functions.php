<?php

add_action( 'wp_enqueue_scripts', 'upload_scripts' );
add_filter('the_content', 'do_shortcode');

//Для проверки шорткода


// add_action('init', function() {
//     if (shortcode_exists('miniorange_social_login')) {
//         echo 'Шорткод зарегистрирован!';
//     } else {
//         echo 'Шорткод не найден.';
//     }
// });
//

function upload_scripts() {
	wp_enqueue_style( 'main', get_stylesheet_uri() );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/all.css' );
	wp_enqueue_style( 'mediaquery', get_template_directory_uri() . '/assets/css/media.css' );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js');
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