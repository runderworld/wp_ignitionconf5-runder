<?php
//
// Menu Item Post Type related functions.
//

if( !function_exists('ci_create_cpt_keynote') ):
function ci_create_cpt_keynote() {
	$labels = array(
		'name' => _x('Keynotes', 'post type general name', 'ci_theme'),
		'singular_name' => _x('Keynote', 'post type singular name', 'ci_theme'),
		'add_new' => __('New Keynote', 'ci_theme'),
		'add_new_item' => __('Add New Keynote', 'ci_theme'),
		'edit_item' => __('Edit Keynote', 'ci_theme'),
		'new_item' => __('New Keynote', 'ci_theme'),
		'view_item' => __('View Keynote', 'ci_theme'),
		'search_items' => __('Search Keynotes', 'ci_theme'),
		'not_found' =>  __('No Keynotes found', 'ci_theme'),
		'not_found_in_trash' => __('No Keynotes found in the trash', 'ci_theme'),
		'parent_item_colon' => __('Parent Keynote:', 'ci_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('Keynote', 'ci_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'rewrite' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'thumbnail')
	);

	register_post_type( 'keynote' , $args );
}
endif;
?>
