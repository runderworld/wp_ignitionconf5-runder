<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_host_options', 160);
	if( !function_exists('ci_add_tab_host_options') ):
		function ci_add_tab_host_options($tabs)
		{
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Host Options', 'ci_theme');
			return $tabs;
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_host_section'] = '';
	$ci_defaults['host_title'] = 'Host';
	$ci_defaults['host_menu_title'] = 'Host';
	$ci_defaults['host_page'] = '';

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want the Host section disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_host_section', 'disabled', __('Disable Host Section', 'ci_theme')); ?>
	</fieldset>
	
	<fieldset class="set">
		<p class="guide"><?php _e('Enter the title of your Host section (e.g. "Host").' , 'ci_theme'); ?></p>
		<?php ci_panel_input('host_title', __('Host Section Title:', 'ci_theme')); ?>

		<p class="guide"><?php _e('Enter the title of the Host section for the main menu. (e.g. "Hello", or "Host", single words work best).' , 'ci_theme'); ?></p>
		<?php ci_panel_input('host_menu_title', __('Host Menu Title:', 'ci_theme')); ?>
	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Select your Host page. The contents of this page will appear as the contents of the Host section.' , 'ci_theme'); ?></p>

		<label for="<?php echo THEME_OPTIONS; ?>[host_page]"><?php _e('Select the Host page:', 'ci_theme'); ?></label>
		<?php wp_dropdown_pages(array(
			'show_option_none'=>' ',
			'selected'=>$ci['host_page'],
			'name'=>THEME_OPTIONS.'[host_page]'
		)); ?>
	</fieldset>

<?php endif; ?>
