<?php
//
// Menu Item Post Type related functions.
//
add_action('init', 'ci_create_cpt_speaker');
add_action('admin_init', 'ci_add_cpt_speaker_meta');
add_action('save_post', 'ci_update_cpt_speaker_meta');

if( !function_exists('ci_create_cpt_speaker') ):
function ci_create_cpt_speaker() {
	$labels = array(
		'name' => _x('Speakers', 'post type general name', 'ci_theme'),
		'singular_name' => _x('Speaker', 'post type singular name', 'ci_theme'),
		'add_new' => __('New Speaker', 'ci_theme'),
		'add_new_item' => __('Add New Speaker', 'ci_theme'),
		'edit_item' => __('Edit Speaker', 'ci_theme'),
		'new_item' => __('New Speaker', 'ci_theme'),
		'view_item' => __('View Speaker', 'ci_theme'),
		'search_items' => __('Search Speakers', 'ci_theme'),
		'not_found' =>  __('No Speakers found', 'ci_theme'),
		'not_found_in_trash' => __('No Speakers found in the trash', 'ci_theme'),
		'parent_item_colon' => __('Parent Speaker:', 'ci_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('Speaker', 'ci_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'rewrite' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'thumbnail')
	);

	register_post_type( 'speaker' , $args );
}
endif;

if( !function_exists('ci_add_cpt_speaker_meta') ):
function ci_add_cpt_speaker_meta() {
	add_meta_box("ci_cpt_speaker_meta", __('Speaker Presentation Details', 'ci_theme'), "ci_add_cpt_speaker_meta_box", "speaker", "normal", "high");
}
endif;

if( !function_exists('ci_update_cpt_speaker_meta') ):
function ci_update_cpt_speaker_meta($post_id) {
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (isset($_POST['post_view']) and $_POST['post_view']=='list') return;

	if (isset($_POST['post_type']) && $_POST['post_type'] == "speaker")
	{
		update_post_meta($post_id, "ci_cpt_speaker_pres_title", (isset($_POST["ci_cpt_speaker_pres_title"]) ? $_POST["ci_cpt_speaker_pres_title"] : '') );
		update_post_meta($post_id, "ci_cpt_speaker_pres_desc", (isset($_POST["ci_cpt_speaker_pres_desc"]) ? $_POST["ci_cpt_speaker_pres_desc"] : '') );
		update_post_meta($post_id, "ci_cpt_speaker_pres_time", (isset($_POST["ci_cpt_speaker_pres_time"]) ? $_POST["ci_cpt_speaker_pres_time"] : '') );
	}
}
endif;

if( !function_exists('ci_add_cpt_speaker_meta_box') ):
function ci_add_cpt_speaker_meta_box() {
	global $post;
	$pres_title = get_post_meta($post->ID, 'ci_cpt_speaker_pres_title', true);
	$pres_desc = get_post_meta($post->ID, 'ci_cpt_speaker_pres_desc', true);
	$pres_time = get_post_meta($post->ID, 'ci_cpt_speaker_pres_time', true);
	?>
	<p>
		<label for="ci_cpt_speaker_pres_time"><?php _e('Presentation Time:', 'ci_theme'); ?></label>
		<br>
		<input id="ci_cpt_speaker_pres_time" name="ci_cpt_speaker_pres_time" class="medium" type="text" value="<?php echo esc_attr($pres_time); ?>">
	</p>

	<p>
		<label for="ci_cpt_speaker_pres_title"><?php _e('Presentation Title:', 'ci_theme'); ?></label>
		<input id="ci_cpt_speaker_pres_title" name="ci_cpt_speaker_pres_title" class="widefat" type="text" value="<?php echo esc_attr($pres_title); ?>">
	</p>

	<p>
		<label for="ci_cpt_speaker_pres_desc"><?php _e('Presentation Description:', 'ci_theme'); ?></label>
		<textarea id="ci_cpt_speaker_pres_desc" cols="40" rows="2" class="widefat" name="ci_cpt_speaker_pres_desc"><?php echo esc_attr($pres_desc); ?></textarea>
	</p>
	<?php
}
endif;
?>
