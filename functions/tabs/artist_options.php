<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_artist_options', 170);
	if( !function_exists('ci_add_tab_artist_options') ):
		function ci_add_tab_artist_options($tabs)
		{
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Artist Options', 'ci_theme');
			return $tabs;
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_artist_section']	= '';
	$ci_defaults['artist_title'] = 'Artists';
	$ci_defaults['artist_menu_title'] = 'Artists';
	$ci_defaults['artist_columns'] = 'four'; // class "four" actually refers to 3 columns

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want the Artists section disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_artist_section', 'enabled', __('Disable Artists Section', 'ci_theme')); ?>
	</fieldset>
	
	<fieldset class="set">
		<p class="guide"><?php _e('Enter the title of your Artists section. (e.g. "Artists").' , 'ci_theme'); ?></p>
		<?php ci_panel_input('artist_title', __('Artists Section Title:', 'ci_theme')); ?>

		<p class="guide"><?php _e('Enter the Artists section\'s title as it will appear on your Navigation Menu.' , 'ci_theme'); ?></p>
		<?php ci_panel_input('artist_menu_title', __('Artists Menu Title:', 'ci_theme')); ?>
	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Select how many columns you want the Artists area to be. For example, if you have three artists, you should set the number to three columns. If you have eight artists, you should set the number to four columns so that you get two rows of four artists.' , 'ci_theme'); ?></p>
		<?php 
			$options = array(
				'two' => __('Six Columns', 'ci_theme'),
				'three' => __('Four Columns', 'ci_theme'),
				'four' => __('Three Columns', 'ci_theme'),
			);
			ci_panel_dropdown('artist_columns', $options, __('Artist section columns:', 'ci_theme'));
		?>
	</fieldset>

<?php endif; ?>
