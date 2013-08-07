<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_vendor_options', 80);
	if( !function_exists('ci_add_tab_vendor_options') ):
		function ci_add_tab_vendor_options($tabs)
		{
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Vendor Options', 'ci_theme');
			return $tabs;
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_vendor_section']	= '';
	$ci_defaults['vendor_title']	= 'Vendors';
	$ci_defaults['vendor_menu_title']	= 'Vendors';
	$ci_defaults['vendor_columns'] = 'two';

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want the Vendors section disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_vendor_section', 'enabled', __('Disable Vendors Section', 'ci_theme')); ?>
	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Enter the title of your Vendors section. (e.g. "Vendors", single words work best).' , 'ci_theme'); ?></p>
		<?php ci_panel_input('vendor_title', __('Vendors Section Title:', 'ci_theme')); ?>

		<p class="guide"><?php _e('Enter the Vendors section\'s title as it will appear on your Navigation Menu.' , 'ci_theme'); ?></p>
		<?php ci_panel_input('vendor_menu_title', __('Vendors Menu Title:', 'ci_theme')); ?>

	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Select how many columns you want the Vendors area to be. For example, if you have three vendors, you should set the number to three columns. If you have eight vendors, you should set the number to four columns so that you get two rows of four speakers.' , 'ci_theme'); ?></p>
		<?php
			$options = array(
				'two' => __('Six Columns', 'ci_theme'),
				'three' => __('Four Columns', 'ci_theme'),
				'four' => __('Three Columns', 'ci_theme'),
				'six' => __('Two Columns', 'ci_theme'),
				'twelve' => __('One Column', 'ci_theme')
			);
			ci_panel_dropdown('vendors_columns', $options, __('Vendors section columns:', 'ci_theme'));
		?>
	</fieldset>

<?php endif; ?>
