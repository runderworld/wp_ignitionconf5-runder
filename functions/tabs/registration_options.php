<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_registration_options', 70);
	if( !function_exists('ci_add_tab_registration_options') ):
		function ci_add_tab_registration_options($tabs)
		{
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Registration Options', 'ci_theme');
			return $tabs;
		}
	endif;
	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_registration_button']	= '';
	$ci_defaults['button_text']	= 'Register Now';
	$ci_defaults['eventbrite_id'] = '';

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want the Registration button in the menu disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_registration_button', 'enabled', __('Disable Registration Button', 'ci_theme')); ?>
	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Enter the text of the Registration Button (e.g. Register Now).' , 'ci_theme'); ?></p>
		<?php ci_panel_input('button_text', __('Registration Button Text:', 'ci_theme')); ?>

		<p class="guide"><?php _e('Enter the ID of your Eventbrite event if applicable. If the ID is empty and you have selected to show the button it will lead to the contact form instead.' , 'ci_theme'); ?></p>
		<?php ci_panel_input('eventbrite_id', __('Eventbrite ID:', 'ci_theme')); ?>
	</fieldset>

<?php endif; ?>
