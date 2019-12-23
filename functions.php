<?php
/**
 * functions and definitions
 *
 */

/* -- override JQUERY -- */

add_action( 'wp_enqueue_scripts', 'include_jq' );
function include_jq() {
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', '//code.jquery.com/jquery-3.4.1.js', array(), null, true);
    wp_enqueue_script( 'jquery-core');
}

/* -- register scripts and styling -- */
add_action( 'wp_enqueue_scripts', 'rst_enqueue_scripts' );
function rst_enqueue_scripts() {
    //STYLES
	wp_register_style( 'fonts', "//fonts.googleapis.com/css?family=Lato:900|Open+Sans:400,700|Raleway:700,800&display=swap" );
	wp_enqueue_style( 'fonts');
    wp_register_style( 'main', get_template_directory_uri() . "/assets/css/style.css" );
	wp_enqueue_style( 'main');
    wp_register_style( 'font-awesome', "//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" );
	wp_enqueue_style( 'font-awesome');
    wp_register_style( 'swiper', "//unpkg.com/swiper/css/swiper.css" );
	wp_enqueue_style( 'swiper');
    //SCRIPTS
    wp_register_script( 'swiper', '//unpkg.com/swiper/js/swiper.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'swiper');
    wp_register_script( 'main', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'main');
}

/* -- Setup -- */
add_action( 'after_setup_theme', 'rst_setup' );
if ( ! function_exists( 'rst_setup' ) ){
    function rst_setup(){
        add_theme_support( 'custom-logo', array(
            'height'      => 46,
	        'width'       => 40,
			'flex-width'  => true,
			'flex-height' => true,
		) );
        register_nav_menus(
            array( 
              'first_menu' => __('First menu', 'redstone'),
              'second_menu' => __('Second menu', 'redstone'),
            )
	   );
    }
}

/* -- Menu Walker -- */
include_once('helpers/walker.php');

/* -- ACF settings -- */
include_once('helpers/acf-helpers.php');