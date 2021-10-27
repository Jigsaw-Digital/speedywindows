<?php

// Sectors
function collections_post_type() {
	$labels = array(
		'name'               => _x( 'Collections', 'post type general name', '' ),
		'singular_name'      => _x( 'Collection', 'post type singular name', '' ),
		'add_new'            => _x( 'Add New', 'Collection', '' ),
		'add_new_item'       => __( 'Add New Collection', '' ),
		'edit_item'          => __( 'Edit Collection', '' ),
		'new_item'           => __( 'New Collection', '' ),
		'all_items'          => __( 'All Collections', '' ),
		'view_item'          => __( 'View Collection', '' ),
		'search_items'       => __( 'Search Collections', '' ),
		'not_found'          => __( 'No Collections found', '' ),
		'not_found_in_trash' => __( 'No Collections found in Trash', '' ),
		'parent_item_colon'  => '',
		'menu_name'          => __( 'Collections', '' )
	);
	$args   = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => _x( 'collections', 'URL slug', '' ) ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-book',
		'supports'           => array( 'title', 'thumbnail', 'page-attributes' )
	);
	register_post_type( 'collections', $args );
}
add_action( 'init', 'collections_post_type' );