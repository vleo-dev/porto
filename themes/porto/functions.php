<?php
function vdev_enqueue_styles_scripts() {

	wp_enqueue_script( 'swiper', get_theme_file_uri( '/assets/swiper/swiper-bundle.min.js' ), array(), '11.0.5', true );
	wp_enqueue_script( 'front', get_theme_file_uri( '/js/front.js' ), array( 'swiper' ), filemtime( get_theme_file_path( '/js/front.js' ) ), true );
	// Enqueue global stylesheet.
	wp_enqueue_style( 'swiper', get_theme_file_uri( '/assets/swiper/swiper-bundle.min.css' ), array(), '11.0.5' );
	wp_enqueue_style( 'style', get_theme_file_uri( '/style.css' ), array(), filemtime( get_theme_file_path( '/style.css' ) ) );

	wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        array(),
        '6.5.0'
    );

}
add_action( 'wp_enqueue_scripts', 'vdev_enqueue_styles_scripts' );

