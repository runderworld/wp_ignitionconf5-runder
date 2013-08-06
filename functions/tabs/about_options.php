<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_about_options', 30);
	if( !function_exists('ci_add_tab_about_options') ):
		function ci_add_tab_about_options($tabs)
		{
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('About Options', 'ci_theme');
			return $tabs;
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_about_section'] = '';
	$ci_defaults['about_title'] = 'About';
	$ci_defaults['about_menu_title'] = 'About';
	$ci_defaults['about_page'] = '';

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want the About section disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_about_section', 'disabled', __('Disable About Section', 'ci_theme')); ?>
	</fieldset>
	
	<fieldset class="set">
		<p class="guide"><?php _e('Enter the title of your About section. (e.g. "Hello", or "About", single words work best).' , 'ci_theme'); ?></p>
		<?php ci_panel_input('about_title', __('About Section Title:', 'ci_theme')); ?>

		<p class="guide"><?php _e('Enter the title of the About section for the main menu. (e.g. "Hello", or "About", single words work best).' , 'ci_theme'); ?></p>
		<?php ci_panel_input('about_menu_title', __('About Menu Title:', 'ci_theme')); ?>
	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Select your About page. The contents of this page will appear as the contents of the About section.' , 'ci_theme'); ?></p>

		<label for="<?php echo THEME_OPTIONS; ?>[about_page]"><?php _e('Select the About page:', 'ci_theme'); ?></label>
		<?php wp_dropdown_pages(array(
			'show_option_none'=>' ',
			'selected'=>$ci['about_page'],
			'name'=>THEME_OPTIONS.'[about_page]'
		)); ?>
	</fieldset>

<?php endif; ?>
