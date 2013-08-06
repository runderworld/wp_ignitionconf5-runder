<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_contact_options', 90);
	if( !function_exists('ci_add_tab_contact_options') ):
		function ci_add_tab_contact_options($tabs)
		{
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Contact Options', 'ci_theme');
			return $tabs;
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['disable_contact_section'] = '';
	$ci_defaults['disable_map']	= '';
	$ci_defaults['contact_title'] = 'Contact us';
	$ci_defaults['contact_menu_title'] = 'Contact';
	$ci_defaults['m_contact_page'] = '';
	$ci_defaults['map_tooltip'] = 'Pointblank Str. 14, 54242, California';
	$ci_defaults['map_coords'] = '33.59,-80';
	$ci_defaults['map_zoom_level'] = '6';

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('Check the following box if you want this section disabled.', 'ci_theme'); ?></p>
		<?php ci_panel_checkbox('disable_contact_section', 'enabled', __('Disable Contact Section', 'ci_theme')); ?>
	</fieldset>
	
	<fieldset class="set">
		<p class="guide"><?php _e('Enter the title of your Contact section. (e.g. "Contact Us", single words work best).' , 'ci_theme'); ?></p>
		<?php ci_panel_input('contact_title', __('Contact Section Title:', 'ci_theme')); ?>

		<p class="guide"><?php _e('Enter the Contact section\'s title as it will appear on your Navigation Menu.' , 'ci_theme'); ?></p>
		<?php ci_panel_input('contact_menu_title', __('Contact Menu Title:', 'ci_theme')); ?>
	</fieldset>

	<fieldset class="set">
		<p class="guide"><?php _e('Map Settings: Here you can customize your map settings. If you need to enter a Google Maps API key, you can do so in <strong>Google Options</strong>.', 'ci_theme');?> </p>
		<?php ci_panel_input('map_coords', __('Enter the exact coordinates of your address (you can find your coordinates based on address using this tool: http://itouchmap.com/latlong.html):', 'ci_theme')); ?>
		<?php ci_panel_input('map_zoom_level', __('Enter a single number from 1 to 20 that represents the default zoom level you want on your map. Higher number means closer.', 'ci_theme')); ?>
		<?php ci_panel_input('map_tooltip', __('Enter the text you wish to display when a user clicks on the map pin that points to your address (e.g. Your actual address):', 'ci_theme')); ?>
		<?php ci_panel_checkbox('disable_map', 'enabled', __('Disable the Map', 'ci_theme')); ?>
	</fieldset>
	
	<fieldset class="set">
		<p class="guide"><?php _e('Select your Contact page. Whatever you put in that page (e.g. a Contact Form) will be displayed in your Contact Section.' , 'ci_theme'); ?></p>
	
		<label for="<?php echo THEME_OPTIONS; ?>[m_contact_page]"><?php _e('Select the Contact page:', 'ci_theme'); ?></label>
		<?php wp_dropdown_pages(array(
			'show_option_none'=>' ',
			'selected'=>$ci['m_contact_page'],
			'name'=>THEME_OPTIONS.'[m_contact_page]'
		)); ?>
	</fieldset>

<?php endif; ?>
