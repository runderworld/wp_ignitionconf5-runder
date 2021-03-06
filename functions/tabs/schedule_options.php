<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_schedule_options', 60);
	if( !function_exists('ci_add_tab_schedule_options') ):
		function ci_add_tab_schedule_options($tabs)
		{
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Schedule Options', 'ci_theme');
			return $tabs;
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_schedule_section']	= '';
	$ci_defaults['schedule_title']	= 'Schedule';
	$ci_defaults['schedule_menu_title'] = 'Schedule';
	$ci_defaults['schedule_page'] = '';

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want the Schedule section disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_schedule_section', 'enabled', __('Disable Schedule Section', 'ci_theme')); ?>
	</fieldset>
	
	<fieldset class="set">
		<p class="guide"><?php _e('Enter the title of your Schedule section. (e.g. "Portfolio", single words work best).' , 'ci_theme'); ?></p>
		<?php ci_panel_input('schedule_title', __('Schedule Section Title:', 'ci_theme')); ?>

		<p class="guide"><?php _e('Enter the Schedule section\'s title as it will appear on your Navigation Menu.' , 'ci_theme'); ?></p>
		<?php ci_panel_input('schedule_menu_title', __('Schedule Menu Title:', 'ci_theme')); ?>
	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Select your Schedule page. The contents of this page will appear as the contents of the Schedule section.' , 'ci_theme'); ?></p>

		<label for="<?php echo THEME_OPTIONS; ?>[schedule_page]"><?php _e('Select the Schedule page:', 'ci_theme'); ?></label>
		<?php wp_dropdown_pages(array(
			'show_option_none'=>' ',
			'selected'=>$ci['schedule_page'],
			'name'=>THEME_OPTIONS.'[schedule_page]'
		)); ?>
	</fieldset>

<?php endif; ?>
