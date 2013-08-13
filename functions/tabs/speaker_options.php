<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_speaker_options', 50);
	if( !function_exists('ci_add_tab_speaker_options') ):
		function ci_add_tab_speaker_options($tabs)
		{
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Speaker Options', 'ci_theme');
			return $tabs;
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_speaker_section']	= '';
	$ci_defaults['speaker_title'] = 'Speakers';
	$ci_defaults['speaker_menu_title'] = 'Speakers';

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want the Speakers section disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_speaker_section', 'enabled', __('Disable Speakers Section', 'ci_theme')); ?>
	</fieldset>
	
	<fieldset class="set">
		<p class="guide"><?php _e('Enter the title of your Speakers section; single words work best (e.g. "Speakers").' , 'ci_theme'); ?></p>
		<?php ci_panel_input('speaker_title', __('Speakers Section Title:', 'ci_theme')); ?>

		<p class="guide"><?php _e('Enter the Speakers section\'s title as it will appear on your navigation menu.' , 'ci_theme'); ?></p>
		<?php ci_panel_input('speaker_menu_title', __('Speakers Menu Title:', 'ci_theme')); ?>
	</fieldset>
	
<?php endif; ?>
