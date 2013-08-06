<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_slider_options', 20);
	if( !function_exists('ci_add_tab_slider_options') ):
		function ci_add_tab_slider_options($tabs)
		{
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Slider Options', 'ci_theme');
			return $tabs;
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_slider_section'] = '';

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want this section disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_slider_section', 'enabled', __('Disable Slider Section', 'ci_theme')); ?>
	</fieldset>

<?php endif; ?>
