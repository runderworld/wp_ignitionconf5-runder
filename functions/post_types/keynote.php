<?php
//
// Menu Item Post Type related functions.
//
add_action('init', 'ci_create_cpt_keynote');
add_action('admin_init', 'ci_add_cpt_keynote_meta');
add_action('save_post', 'ci_update_cpt_keynote_meta');

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

if( !function_exists('ci_add_cpt_keynote_meta') ):
function ci_add_cpt_keynote_meta(){
	//add_meta_box("ci_cpt_keynote_meta", __('Keynote Details', 'ci_theme'), "ci_add_cpt_keynote_meta_box", "keynote", "normal", "high");
}
endif;

if( !function_exists('ci_update_cpt_keynote_meta') ):
function ci_update_cpt_keynote($post_id){
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if (isset($_POST['post_view']) and $_POST['post_view']=='list') return;

	if (isset($_POST['post_type']) && $_POST['post_type'] == "vendor")
	{
		update_post_meta($post_id, "ci_cpt_vendor_url", (isset($_POST["ci_cpt_vendor_url"]) ? $_POST["ci_cpt_vendor_url"] : '') );
		update_post_meta($post_id, "ci_cpt_vendor_target_blank", (isset($_POST["ci_cpt_vendor_target_blank"]) ? $_POST["ci_cpt_vendor_target_blank"] : '') );
	}
}
endif;


if( !function_exists('ci_add_cpt_keynote_meta_box') ):
function ci_add_cpt_keynote_meta_box() {
	//...
}
endif;
?>
