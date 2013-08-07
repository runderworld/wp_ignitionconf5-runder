<?php
//
// Menu Item Post Type related functions.
//

if( !function_exists('ci_create_cpt_artist') ):
function ci_create_cpt_artist() {
	$labels = array(
		'name' => _x('Artists', 'post type general name', 'ci_theme'),
		'singular_name' => _x('Artist', 'post type singular name', 'ci_theme'),
		'add_new' => __('New Artist', 'ci_theme'),
		'add_new_item' => __('Add New Artist', 'ci_theme'),
		'edit_item' => __('Edit Artist', 'ci_theme'),
		'new_item' => __('New Artist', 'ci_theme'),
		'view_item' => __('View Artist', 'ci_theme'),
		'search_items' => __('Search Artists', 'ci_theme'),
		'not_found' =>  __('No Artists found', 'ci_theme'),
		'not_found_in_trash' => __('No Artists found in the trash', 'ci_theme'),
		'parent_item_colon' => __('Parent Artist:', 'ci_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('Artist', 'ci_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'rewrite' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'thumbnail')
	);

	register_post_type( 'artist' , $args );
}
endif;
?>
