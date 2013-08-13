<?php
//
// Menu Item Post Type related functions.
//
add_action('init', 'ci_create_cpt_artist');
add_action('admin_init', 'ci_add_cpt_artist_meta');
add_action('save_post', 'ci_update_cpt_artist_meta');

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

if( !function_exists('ci_add_cpt_artist_meta') ):
function ci_add_cpt_artist_meta() {
	add_meta_box("ci_cpt_artist_meta", __('Artist Performance Date/Time', 'ci_theme'), "ci_add_cpt_artist_meta_box", "artist", "normal", "high");
}
endif;

if( !function_exists('ci_update_cpt_artist_meta') ):
function ci_update_cpt_artist($post_id) {
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if (isset($_POST['post_view']) and $_POST['post_view']=='list') return;

	if (isset($_POST['post_type']) && $_POST['post_type'] == "artist")
	{
		update_post_meta($post_id, "ci_cpt_artist_perf_date_time", (isset($_POST["ci_cpt_artist_perf_date"]) ? $_POST["ci_cpt_artist_perf_date"] : '') );
	}
}
endif;

if( !function_exists('ci_add_cpt_artist_meta_box') ):
function ci_add_cpt_artist_meta_box() {
	global $post;
	$perf_date_time = get_post_meta($post->ID, 'ci_cpt_artist_perf_date_time', true);
	?>
	<p>
		<label for="ci_cpt_artist_perf_date_time"><?php _e('Artist Performance Date/Time:', 'ci_theme'); ?></label>
		<br>
		<input id="ci_cpt_artist_perf_date_time" name="ci_cpt_artist_perf_date_time" class="medium" type="text" value="<?php echo esc_attr($perf_date_time); ?>">
	</p>
<?php
}
endif;
?>