<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_keynote_options', 40);
	if( !function_exists('ci_add_tab_keynote_options') ):
		function ci_add_tab_keynote_options($tabs)
		{
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Keynote Options', 'ci_theme');
			return $tabs;
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_keynote_section']	= '';
	$ci_defaults['keynote_title'] = 'Keynote Speakers';
	$ci_defaults['keynote_menu_title'] = 'Keynote Speakers';
	$ci_defaults['keynote_columns'] = 'four'; // class "four" actually refers to 3 columns

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want the Keynote Speakers section disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_keynote_section', 'enabled', __('Disable Keynote Speakers Section', 'ci_theme')); ?>
	</fieldset>
	
	<fieldset class="set">
		<p class="guide"><?php _e('Enter the title of your Keynote Speakers section. (e.g. "Keynote Speakers").' , 'ci_theme'); ?></p>
		<?php ci_panel_input('keynote_title', __('Keynote Speakers Section Title:', 'ci_theme')); ?>

		<p class="guide"><?php _e('Enter the Keynote Speaker section\'s title as it will appear on your Navigation Menu.' , 'ci_theme'); ?></p>
		<?php ci_panel_input('keynote_menu_title', __('Keynote Speakers Menu Title:', 'ci_theme')); ?>
	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Select how many columns you want the keynote speakers area to be. For example, if you have three keynote speakers, you should set the number to three columns. If you have eight keynote speakers, you should set the number to four columns so that you get two rows of four keynote speakers.' , 'ci_theme'); ?></p>
		<?php 
			$options = array(
				'two' => __('Six Columns', 'ci_theme'),
				'three' => __('Four Columns', 'ci_theme'),
				'four' => __('Three Columns', 'ci_theme'),
			);
			ci_panel_dropdown('keynote_columns', $options, __('Keynote Speaker section columns:', 'ci_theme'));
		?>
	</fieldset>

<?php endif; ?>
