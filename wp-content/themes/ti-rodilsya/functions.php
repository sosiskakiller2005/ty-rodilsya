<?php

add_action( 'wp_enqueue_scripts', 'upload_scripts' );

function upload_scripts() {
	wp_enqueue_style( 'main', get_stylesheet_uri() );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/all.css' );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js');
}
?>