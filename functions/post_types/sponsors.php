<?php
//
// Menu Item Sponsors related functions.
//
add_action('init', 'ci_create_cpt_sponsors');
add_action('admin_init', 'ci_add_cpt_sponsor_meta');
add_action('save_post', 'ci_update_cpt_sponsor_meta');

if( !function_exists('ci_create_cpt_sponsors') ):
function ci_create_cpt_sponsors() {
	$labels = array(
		'name' => _x('Sponsors', 'post type general name', 'ci_theme'),
		'singular_name' => _x('Sponsor', 'post type singular name', 'ci_theme'),
		'add_new' => __('New Sponsor', 'ci_theme'),
		'add_new_item' => __('Add New Sponsor', 'ci_theme'),
		'edit_item' => __('Edit Sponsor', 'ci_theme'),
		'new_item' => __('New Sponsor', 'ci_theme'),
		'view_item' => __('View Sponsor', 'ci_theme'),
		'search_items' => __('Search Sponsors', 'ci_theme'),
		'not_found' =>  __('No Sponsors found', 'ci_theme'),
		'not_found_in_trash' => __('No Sponsors found in the trash', 'ci_theme'),
		'parent_item_colon' => __('Parent Sponsor:', 'ci_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('Sponsor', 'ci_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'rewrite' => true,
		'menu_position' => 5,
		'supports' => array('title', 'thumbnail')
	);
	
	register_post_type( 'sponsor' , $args );
}

endif;

if( !function_exists('ci_add_cpt_sponsor_meta') ):
function ci_add_cpt_sponsor_meta(){
	add_meta_box("ci_cpt_sponsor_meta", __('Sponsor Details', 'ci_theme'), "ci_add_cpt_sponsor_meta_box", "sponsor", "normal", "high");
}
endif;

if( !function_exists('ci_update_cpt_sponsor_meta') ):
function ci_update_cpt_sponsor_meta($post_id){
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if (isset($_POST['post_view']) and $_POST['post_view']=='list') return;

	if (isset($_POST['post_type']) && $_POST['post_type'] == "sponsor")
	{
		update_post_meta($post_id, "ci_cpt_sponsor_url", (isset($_POST["ci_cpt_sponsor_url"]) ? $_POST["ci_cpt_sponsor_url"] : '') );
		update_post_meta($post_id, "ci_cpt_sponsor_target_blank", (isset($_POST["ci_cpt_sponsor_target_blank"]) ? $_POST["ci_cpt_sponsor_target_blank"] : '') );
	}
}
endif;

if( !function_exists('ci_add_cpt_sponsor_meta_box') ):
function ci_add_cpt_sponsor_meta_box(){
	global $post;
	$sponsor_url = get_post_meta($post->ID, 'ci_cpt_sponsor_url', true);
	$target_blank = get_post_meta($post->ID, 'ci_cpt_sponsor_target_blank', true);
	?>
	<p>
		<?php _e('Sponsor URL (Don\'t forget the <strong>http://</strong>):', 'ci_theme'); ?>
		<input id="ci_cpt_sponsor_url" name="ci_cpt_sponsor_url" class="widefat" type="text" value="<?php echo esc_attr($sponsor_url); ?>">
	</p>

	<p>
		<input type="checkbox" id="ci_cpt_sponsor_target_blank" name="ci_cpt_sponsor_target_blank" value="target_blank" <?php checked($target_blank, 'target_blank'); ?> />
		<label for="ci_cpt_sponsor_target_blank"> <?php _e('Open sponsor link in a new tab?', 'ci_theme'); ?></label>
	</p>
	<?php
}
endif;

?>
