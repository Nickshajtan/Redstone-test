<?php
// acf json sync
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;  
}


// acf options page
if( function_exists('acf_add_options_page') ) {
	$parent = acf_add_options_page(array(
		'page_title'	=> __('Theme General Settings', 'Redstone'),
		'menu_title'	=> __('Theme Settings', 'Redstone'),
		'menu_slug'		=> 'theme-general-settings',
		'icon_url'		=> 'dashicons-info',
		'redirect'		=> true
	));
}

// get acf title with tags
function get_rst_title($class = 'h1'){
	$tag = get_field( 'tag' );
	if (empty($tag)) { $tag = 'div';	};
	return '<'.$tag.' class="'.$class.'">'.get_field( 'block_title' ).'</'.$tag.'>' ; 
}
