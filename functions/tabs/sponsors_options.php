<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_sponsors_options', 70);
	if( !function_exists('ci_add_tab_sponsors_options') ):
		function ci_add_tab_sponsors_options($tabs)
		{
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Sponsors Options', 'ci_theme');
			return $tabs;
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_sponsors_section']	= '';
	$ci_defaults['sponsors_title']	= 'Sponsors';
	$ci_defaults['sponsors_menu_title']	= 'Sponsors';
	$ci_defaults['sponsors_columns'] = 'two';

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want the Sponsors section disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_sponsors_section', 'enabled', __('Disable Sponsors Section', 'ci_theme')); ?>
	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Enter the title of your Sponsors section. (e.g. "Sponsors", single words work best).' , 'ci_theme'); ?></p>
		<?php ci_panel_input('sponsors_title', __('Sponsors Section Title:', 'ci_theme')); ?>

		<p class="guide"><?php _e('Enter the Sponsors section\'s title as it will appear on your Navigation Menu.' , 'ci_theme'); ?></p>
		<?php ci_panel_input('sponsors_menu_title', __('Sponsors Menu Title:', 'ci_theme')); ?>

	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Select how many columns you want the sponsors area to be. For example, if you have three sponsors, you should set the number to three columns. If you have eight sponsors, you should set the number to four columns so that you get two rows of four speakers.' , 'ci_theme'); ?></p>
		<?php
			$options = array(
				'two' => __('Six Columns', 'ci_theme'),
				'three' => __('Four Columns', 'ci_theme'),
				'four' => __('Three Columns', 'ci_theme'),
				'six' => __('Two Columns', 'ci_theme'),
				'twelve' => __('One Column', 'ci_theme')
			);
			ci_panel_dropdown('sponsors_columns', $options, __('Sponsors section columns:', 'ci_theme'));
		?>
	</fieldset>

<?php endif; ?>
