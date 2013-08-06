<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_site_options', 10);
	if( !function_exists('ci_add_tab_site_options') ):
		function ci_add_tab_site_options($tabs) 
		{ 
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Site Options', 'ci_theme');
			return $tabs; 
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['hide_widgets'] = 'enabled';
	$ci_defaults['hide_wordpress_menus'] = 'enabled';

	load_panel_snippet('logo');
	load_panel_snippet('favicon');
	load_panel_snippet('touch_favicon');


	add_action( 'admin_menu', 'ci_hide_admin_menus' );
	if( !function_exists('ci_hide_admin_menus') ):
	function ci_hide_admin_menus()
	{
		if( ci_setting('hide_wordpress_menus') != 'enabled' )
			return;
			
		// Hides links
		remove_menu_page('link-manager.php');
		// Hides posts
		remove_menu_page('edit.php');
		// Hides comments
		remove_menu_page('edit-comments.php');

		// Hides widgets
		//remove_submenu_page('themes.php', 'widgets.php');

		// Hides pages
		//remove_menu_page('edit.php?post_type=page');
	}
	endif;
	
	add_action('widgets_init', 'ci_unregister_widgets');
	if( !function_exists('ci_unregister_widgets') ):
	function ci_unregister_widgets()
	{
		if( ci_setting('hide_widgets') != 'enabled' )
			return;

		unregister_widget('WP_Widget_Pages');
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Archives');
		unregister_widget('WP_Widget_Search');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Recent_Comments');
		unregister_widget('WP_Widget_Tag_Cloud');
	}
	endif;
?>
<?php else: ?>

	<?php load_panel_snippet('logo'); ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Widgets that are irrelevant to this theme, are hidden by default. Uncheck the related checkbox if you want to enable them. Also, some WordPress admin menus that are not used with this theme are hidden too, i.e. posts, comments, and links, so you get a cleaner interface. You can unhide the menus if you prefer by unchecking the respective checkboxes.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('hide_widgets', 'enabled', __('Hide irrelevant widgets', 'ci_theme')); ?>
		<?php ci_panel_checkbox('hide_wordpress_menus', 'enabled', __('Hide irrelevant admin menus', 'ci_theme')); ?>
	</fieldset>

	<?php load_panel_snippet('favicon'); ?>

	<?php load_panel_snippet('touch_favicon'); ?>

	<?php load_panel_snippet('sample_content'); ?>

<?php endif; ?>
