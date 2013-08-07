<?php
//
// Menu Item Post Type related functions.
//
add_action('init', 'ci_create_cpt_vendor');
add_action('admin_init', 'ci_add_cpt_vendor_meta');
add_action('save_post', 'ci_update_cpt_vendor_meta');

if( !function_exists('ci_create_cpt_vendor') ):
function ci_create_cpt_vendor() {
	$labels = array(
		'name' => _x('Vendors', 'post type general name', 'ci_theme'),
		'singular_name' => _x('Vendor', 'post type singular name', 'ci_theme'),
		'add_new' => __('New Vendor', 'ci_theme'),
		'add_new_item' => __('Add New Vendor', 'ci_theme'),
		'edit_item' => __('Edit Vendor', 'ci_theme'),
		'new_item' => __('New Vendor', 'ci_theme'),
		'view_item' => __('View Vendor', 'ci_theme'),
		'search_items' => __('Search Vendors', 'ci_theme'),
		'not_found' =>  __('No Vendors found', 'ci_theme'),
		'not_found_in_trash' => __('No Vendors found in the trash', 'ci_theme'),
		'parent_item_colon' => __('Parent Vendor:', 'ci_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('Vendor', 'ci_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'rewrite' => true,
		'menu_position' => 5,
		'supports' => array('title', 'thumbnail')
	);
	
	register_post_type( 'vendor' , $args );
}

endif;

if( !function_exists('ci_add_cpt_vendor_meta') ):
function ci_add_cpt_vendor_meta(){
	add_meta_box("ci_cpt_vendor_meta", __('Vendor Details', 'ci_theme'), "ci_add_cpt_vendor_meta_box", "vendor", "normal", "high");
}
endif;

if( !function_exists('ci_update_cpt_vendor_meta') ):
function ci_update_cpt_vendor_meta($post_id){
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if (isset($_POST['post_view']) and $_POST['post_view']=='list') return;

	if (isset($_POST['post_type']) && $_POST['post_type'] == "vendor")
	{
		update_post_meta($post_id, "ci_cpt_vendor_url", (isset($_POST["ci_cpt_vendor_url"]) ? $_POST["ci_cpt_vendor_url"] : '') );
		update_post_meta($post_id, "ci_cpt_vendor_target_blank", (isset($_POST["ci_cpt_vendor_target_blank"]) ? $_POST["ci_cpt_vendor_target_blank"] : '') );
	}
}
endif;

if( !function_exists('ci_add_cpt_vendor_meta_box') ):
function ci_add_cpt_vendor_meta_box(){
	global $post;
	$vendor_url = get_post_meta($post->ID, 'ci_cpt_vendor_url', true);
	$target_blank = get_post_meta($post->ID, 'ci_cpt_vendor_target_blank', true);
	?>
	<p>
		<?php _e('Vendor URL (Don\'t forget the <strong>http://</strong>):', 'ci_theme'); ?>
		<input id="ci_cpt_vendor_url" name="ci_cpt_vendor_url" class="widefat" type="text" value="<?php echo esc_attr($vendor_url); ?>">
	</p>

	<p>
		<input type="checkbox" id="ci_cpt_vendor_target_blank" name="ci_cpt_vendor_target_blank" value="target_blank" <?php checked($target_blank, 'target_blank'); ?> />
		<label for="ci_cpt_vendor_target_blank"> <?php _e('Open vendor link in a new tab?', 'ci_theme'); ?></label>
	</p>
	<?php
}
endif;

?>
