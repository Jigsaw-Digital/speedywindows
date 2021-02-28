<?php

// #Setting up thumbnails

add_theme_support( 'post-thumbnails' );
add_image_size( 'full-bleed', 1800, 750, true );
add_image_size( 'square640', 640, 640, true );
add_image_size( 'rectangle640', 640, 320, true );
add_image_size( 'logos', 9999, 70, true );

add_image_size( 'book-cover', 538, 800, true );

// #Wrap iframe in div

add_filter( 'embed_oembed_html', 'my_embed_oembed_html', 99, 4 );
function my_embed_oembed_html( $html, $url, $attr, $post_id ) {
	return '<div class="video">' . $html . '</div>';
}

// General Pagination

function pagination( $query, $slug, $pages = '', $range = 2, $suffix = '' ) {
	$morepages = ( $range * 2 ) + 1;
	global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}
	if ( $pages == '' ) {
		$pages = $query->max_num_pages;
		if ( ! $pages ) {
			$pages = 1;
		}
	}
	if ( 1 != $pages ) {
		echo '<div class="pagination"><ul class="clearfix">';

		//Range of pages
		for ( $i = 1; $i <= $pages; $i ++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $morepages ) ) {
				echo ( $paged == $i ) ? '<li><a class="active">' . $i : '<li><a href="' . $slug . $i . '/' . $suffix . '">' . $i . '</a>';
			}
		}

		echo '</ul></div>';
	}
}


// General Pagination
function getPrevNext( $category = null ) {
	$args = array(
		'post_type'      => 'books',
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'posts_per_page' => - 1
	);

	// Add category filter to args
	if ( $category ) {
		$args['tax_query'][] = [
			'taxonomy' => 'series',
			'field'    => 'slug',
			'terms'    => $category,
		];
	}

	$pagelist = get_posts( $args );
	$pages    = array();
	foreach ( $pagelist as $page ) {
		$pages[] += $page->ID;
	}

	$current = array_search( get_the_ID(), $pages );
	$prevID  = $pages[ $current - 1 ];
	$nextID  = $pages[ $current + 1 ];

	if ( ! empty( $prevID ) ) {
		echo '<div class="prev-link col--50">';
		echo '<a href="' . get_permalink( $prevID ) . '">&#39;' . get_the_title( $prevID ) . '&#39;</a>';
		echo '</div>';
	}
	if ( empty( $prevID ) ) {
		echo '<div class="prev-link col--50">';
		echo '';
		echo '</div>';
	}

	if ( ! empty( $nextID ) ) {
		echo '<div class="next-link col--50">';
		echo '<a href="' . get_permalink( $nextID ) . '">&#39;' . get_the_title( $nextID ) . '&#39;</a>';
		echo '</div>';
	}
	if ( empty( $nextID ) ) {
		echo '<div class="next-link col--50">';
		echo '';
		echo '</div>';
	}
}


// General Pagination
function getPostPrevNext() {
	$args     = array( 'post_type' => 'post', 'posts_per_page' => - 1 );
	$pagelist = get_posts( $args );
	$pages    = array();
	foreach ( $pagelist as $page ) {
		$pages[] += $page->ID;
	}

	$current = array_search( get_the_ID(), $pages );
	$prevID  = $pages[ $current - 1 ];
	$nextID  = $pages[ $current + 1 ];

	if ( ! empty( $prevID ) ) {
		echo '<div class="prev-link col--50">';
		echo '<a href="' . get_permalink( $prevID ) . '">&#39;' . get_the_title( $prevID ) . '&#39;</a>';
		echo '</div>';
	}

	if ( empty( $prevID ) ) {
		echo '<div class="prev-link col--50">';
		echo '';
		echo '</div>';
	}

	if ( ! empty( $nextID ) ) {
		echo '<div class="next-link col--50">';
		echo '<a href="' . get_permalink( $nextID ) . '">&#39;' . get_the_title( $nextID ) . '&#39;</a>';
		echo '</div>';
	}

	if ( empty( $nextID ) ) {
		echo '<div class="next-link col--50">';
		echo '';
		echo '</div>';
	}
}


// #Ajax posts
function get_about_pages() {
	$response = array();

	global $post;
	$post = get_post( $_POST['page_id'] );

	ob_start();
	get_layouts();
	$response['html'] = ob_get_contents();
	ob_end_clean();

	echo json_encode( $response );
	wp_die();
}

add_action( 'wp_ajax_get_about_pages', 'get_about_pages' );
add_action( 'wp_ajax_nopriv_get_about_pages', 'get_about_pages' );


// #Explore posts
function get_book_posts() {
	$response = array();

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		$category = ( isset( $_POST['cat'] ) ? $_POST['cat'] : false );
	} else {
		$category = ( isset( $_GET['cat'] ) ? $_GET['cat'] : false );
	}

	ob_start();

	include get_template_directory() . '/partials/books.php';

	$response['html'] = ob_get_contents();
	ob_end_clean();

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		echo json_encode( $response );
		wp_die();
	} else {
		return $response['html'];
	}
}

add_action( 'wp_ajax_get_book_posts', 'get_book_posts' );
add_action( 'wp_ajax_nopriv_get_book_posts', 'get_book_posts' );

add_action( 'wp_ajax_get_booktrail_posts', 'get_booktrail_posts' );
add_action( 'wp_ajax_nopriv_get_booktrail_posts', 'get_booktrail_posts' );
function get_booktrail_posts() {
	$response = array();

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		$booktrail_book = ( isset( $_POST['cat'] ) ? $_POST['cat'] : '' );
	} else {
		$booktrail_book = ( isset( $_GET['cat'] ) ? $_GET['cat'] : '' );
	}

	ob_start();

	include get_template_directory() . '/partials/booktrails.php';

	$response['html'] = ob_get_contents();
	ob_end_clean();

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		echo json_encode( $response );
		wp_die();
	} else {
		return $response['html'];
	}
}

/**
 * Return the html that displays what letters the user has collected
 *
 * @param $book_trail_id
 *
 * @return string
 */
function get_collected_letters_html( $book_trail_id ) {
	$response          = '';
	$collected_letters = get_collected_letters( $book_trail_id );

	if ( is_array( $collected_letters ) && count( $collected_letters ) > 0 ) {
		foreach ( $collected_letters as $letter => $hidden ) {
			$response .= '<li class="collected-letter ' . ( $hidden ? '' : 'is-empty' ) . '"><span>' . ( $hidden ? strtoupper( $letter ) : '' ) . '</span></li>';
		}
	}else{
		$response = '<p>You have not collected any letters yet.</p>';
	}

	return $response;
}


/**
 * Updates session once location has been reached
 * returns the hidden letter
 */
add_action( 'wp_ajax_got_to_location', 'got_to_location' );
add_action( 'wp_ajax_nopriv_got_to_location', 'got_to_location' );
function got_to_location() {
	// Get location info
	$book_trail_id = ( isset( $_POST['book_trail_id'] ) ) ? intval( $_POST['book_trail_id'] ) : false;
	$location_id   = ( isset( $_POST['location_id'] ) ) ? $_POST['location_id'] : false;
	$at_location   = ( isset( $_POST['at_location'] ) ) ? $_POST['at_location'] : false;
	$plots         = get_field( 'the_trail_plots', $book_trail_id );

	if ( $at_location && $at_location == 'true' ) {
		if ( isset( $_SESSION[ "booktrails_" . $book_trail_id ] ) ) {
			$current_collected_locations                = $_SESSION[ "booktrails_" . $book_trail_id ];
			$current_collected_locations[]              = $location_id;
			$_SESSION[ "booktrails_" . $book_trail_id ] = array_unique( $current_collected_locations );
		} else {
			$_SESSION[ "booktrails_" . $book_trail_id ] = array( $location_id );
		}
	} else {
//		session_unset();
//		$_SESSION["booktrails_".$book_trail_id] = array();
	}

	$collected_letters = get_collected_letters( $book_trail_id );

	if ( is_iterable( $plots ) ) {
		$count = 1;
		foreach ( $plots as $plot ) {
			if ( $plot['uid'] === $location_id ) {
				$chosen_location = $plot;
				$chosen_location_count = $count;
				break;
			}
			$count++;
		}
	}

	ob_start();
	include get_template_directory() . '/partials/card-booktrail-location.php';
	$html = ob_get_clean();

	echo json_encode( array(
		'html'              => $html,
		'collected_letters' => get_collected_letters_html( $book_trail_id ),
	) );

	wp_die();
}

/**
 * Checks if user has collected the location letter
 *
 * @param $booktrail_id
 * @param $uid
 *
 * @return bool
 */
function has_booktrail_location( $booktrail_id, $uid ) {
	if ( isset( $_SESSION[ "booktrails_" . $booktrail_id ] ) && is_array( $_SESSION[ "booktrails_" . $booktrail_id ] ) && in_array( $uid, $_SESSION[ "booktrails_" . $booktrail_id ] ) ) {
		return true;
	}

	return false;
}

/**
 * Get collected letters
 *
 * @param $booktrail_id
 *
 * @return array
 */
function get_collected_letters( $booktrail_id ) {
	if ( isset( $_SESSION[ "booktrails_" . $booktrail_id ] ) && is_array( $_SESSION[ "booktrails_" . $booktrail_id ] ) ) {
		$collected_letters   = array();
		$collected_locations = $_SESSION[ "booktrails_" . $booktrail_id ];
		$plots               = get_field( 'the_trail_plots', $booktrail_id );

		if ( is_iterable( $plots ) ) {
			foreach ( $plots as $plot ) {
				$collected_letters[ $plot['hidden_letter'] ] = in_array( $plot['uid'], $collected_locations );
			}
		}
	}

	return $collected_letters;
}


// MAP HELPER POPUPS

//Ajax for closing map info popup
add_action( 'wp_ajax_nopriv_map_popup_closed', 'map_popup_closed' );
add_action( 'wp_ajax_map_popup_closed', 'map_popup_closed' );

function map_popup_closed() {

	global $post;
	setcookie( "map-popup-closed", true, time() + ( 86400 * 30 ), "/" );
	exit;

}

//Ajax for closing recenter btn popup
add_action( 'wp_ajax_nopriv_recenter_btn_closed', 'recenter_btn_closed' );
add_action( 'wp_ajax_recenter_btn_closed', 'recenter_btn_closed' );

function recenter_btn_closed() {

	global $post;
	setcookie( "recenter-btn-closed", true, time() + ( 86400 * 30 ), "/" );
	exit;

}

//Ajax for closing comp btn popup
add_action( 'wp_ajax_nopriv_competition_btn_closed', 'competition_btn_closed' );
add_action( 'wp_ajax_competition_btn_closed', 'competition_btn_closed' );

function competition_btn_closed() {

	global $post;
	setcookie( "competition-btn-closed", true, time() + ( 86400 * 30 ), "/" );
	exit;

}
