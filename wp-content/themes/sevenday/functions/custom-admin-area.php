<?php

// Options
if (function_exists('acf_add_options_sub_page')) {
    acf_add_options_sub_page('Contact Details');
    acf_add_options_sub_page('Roundel');
}
if (function_exists('acf_set_options_page_title')) {
    acf_set_options_page_title(('Global Options'));
}


// Add Menus

function register_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'sub-menu' => __( 'Sub Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
    )
  );
}
add_action( 'init', 'register_menus' );

// AJAX filters functions

function ur_load_more() {
	$page = $_POST['pageNo'] + 1;
	$page_type = $_POST['pageType'];

	UR_Pagination::ajax($page, $page_type);
	wp_die();
}
add_action( 'wp_ajax_ur_load_more', 'ur_load_more' );
add_action( 'wp_ajax_nopriv_ur_load_more', 'ur_load_more' );
