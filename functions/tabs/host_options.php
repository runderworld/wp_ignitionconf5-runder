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
	$ci_defaults['host_name'] = '';
	$ci_defaults['host_desc_html'] = '';
	$ci_defaults['host_photo'] = '';
?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want the Host section disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_host_section', 'disabled', __('Disable Host Section', 'ci_theme')); ?>
	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Enter the title of your Host section (e.g. "Meet the Host").' , 'ci_theme'); ?></p>
		<?php ci_panel_input('host_title', __('Host Section Title:', 'ci_theme')); ?>

		<p class="guide"><?php _e('Enter the title of the Host section for the main menu; single words work best (e.g. "Host").' , 'ci_theme'); ?></p>
		<?php ci_panel_input('host_menu_title', __('Host Menu Title:', 'ci_theme')); ?>
	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Specify the name of the host to be displayed.' , 'ci_theme'); ?></p>
		<?php ci_panel_input('host_name', __('Host Name:', 'ci_theme')); ?>

		<p class="guide"><?php _e('Specify the HTML to be output as the description for the host to be displayed.' , 'ci_theme'); ?></p>
		<?php ci_panel_textarea('host_desc_html', __('Host Description (accepts HTML):', 'ci_theme')); ?>

		<p class="guide"><?php _e('Specify a photo for the host to be displayed.' , 'ci_theme'); ?></p>
		<?php ci_panel_upload_image('host_photo', __('Upload a photo of the host to be displayed', 'ci_theme')); ?>
	</fieldset>

<?php endif; ?>
