<?php
//
// Menu Item Post Type related functions.
//
add_action('init', 'ci_create_cpt_slider');
add_action('admin_init', 'ci_add_cpt_slider_meta');
add_action('save_post', 'ci_update_cpt_slider_meta');

if( !function_exists('ci_create_cpt_slider') ):
function ci_create_cpt_slider() {
	$labels = array(
		'name' => _x('Slider Items', 'post type general name', 'ci_theme'),
		'singular_name' => _x('Slider Item', 'post type singular name', 'ci_theme'),
		'add_new' => __('New Slider Item', 'ci_theme'),
		'add_new_item' => __('Add New Slider Item', 'ci_theme'),
		'edit_item' => __('Edit Slider Item', 'ci_theme'),
		'new_item' => __('New Slider Item', 'ci_theme'),
		'view_item' => __('View Slider Item', 'ci_theme'),
		'search_items' => __('Search Slider Items', 'ci_theme'),
		'not_found' =>  __('No Slider Items found', 'ci_theme'),
		'not_found_in_trash' => __('No Slider Items found in the trash', 'ci_theme'),
		'parent_item_colon' => __('Parent Slider:', 'ci_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('Slider Item', 'ci_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'rewrite' => true,
		'menu_position' => 5,
		'supports' => array('title', 'thumbnail')
	);

	register_post_type( 'slider' , $args );
}
endif;

if( !function_exists('ci_add_cpt_slider_meta') ):
function ci_add_cpt_slider_meta(){
	add_meta_box("ci_cpt_slider_meta", __('Slider Details', 'ci_theme'), "ci_add_cpt_slider_meta_box", "slider", "normal", "high");
}
endif;

if( !function_exists('ci_update_cpt_slider_meta') ):
function ci_update_cpt_slider_meta($post_id){
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if (isset($_POST['post_view']) and $_POST['post_view']=='list') return;

	if (isset($_POST['post_type']) && $_POST['post_type'] == "slider")
	{
		update_post_meta($post_id, "ci_cpt_slider_super_title", (isset($_POST["ci_cpt_slider_super_title"]) ? $_POST["ci_cpt_slider_super_title"] : '') );
		update_post_meta($post_id, "ci_cpt_slider_subtitle", (isset($_POST["ci_cpt_slider_subtitle"]) ? $_POST["ci_cpt_slider_subtitle"] : '') );
	}
}
endif;

if( !function_exists('ci_add_cpt_slider_meta_box') ):
function ci_add_cpt_slider_meta_box(){
	global $post;
	$super_title = get_post_meta($post->ID, 'ci_cpt_slider_super_title', true);
	$subtitle = get_post_meta($post->ID, 'ci_cpt_slider_subtitle', true);
	?>
	<p>
		<label for="ci_cpt_slider_super_title"><?php _e('Slider Super Title (Displayed on top of the main title):', 'ci_theme'); ?></label>
		<input id="ci_cpt_slider_super_title" name="ci_cpt_slider_super_title" class="widefat" type="text" value="<?php echo esc_attr($super_title); ?>">
	</p>

	<p>
		<label for="ci_cpt_slider_subtitle"><?php _e('Slider Subtitle (Displayed at the bottom of the main title):', 'ci_theme'); ?></label>
		<input id="ci_cpt_slider_subtitle" name="ci_cpt_slider_subtitle" class="widefat" type="text" value="<?php echo esc_attr($subtitle); ?>">
	</p>
<?php
}
endif;
?>
