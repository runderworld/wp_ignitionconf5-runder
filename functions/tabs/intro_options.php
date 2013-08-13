<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_intro_options', 180);
	if( !function_exists('ci_add_tab_intro_options') ):
		function ci_add_tab_intro_options($tabs)
		{
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Intro Options', 'ci_theme');
			return $tabs;
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_intro_section'] = '';
	$ci_defaults['intro_content_html'] = '';

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want the Intro section disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_intro_section', 'disabled', __('Disable Intro Section', 'ci_theme')); ?>
	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Specify the HTML to be output in the Intro section.' , 'ci_theme'); ?></p>
		<?php ci_panel_textarea( 'intro_content_html', _e('Intro content (accepts HTML):', 'ci_theme') ); ?>
	</fieldset>

<?php endif; ?>
