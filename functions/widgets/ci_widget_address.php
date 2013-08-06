<?php 
if( !class_exists('CI_Address') ):
class CI_Address extends WP_Widget {

	function CI_Address(){
		$widget_ops = array('description' => __('Address widget', 'ci_theme'));
		$control_ops = array(/*'width' => 300, 'height' => 400*/);
		parent::WP_Widget('ci_address_widget', $name='-= CI Address =-', $widget_ops, $control_ops);
	}

	function widget($args, $instance) {

		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$before_address = $instance['before_address'];
		$ci_name = $instance['ci_name'];
		$url = $instance['url'];
		$email = $instance['email'];
		$address1 = $instance['address1'];
		$address2 = $instance['address2'];
		$postcode = $instance['postcode'];
		$city = $instance['city'];
		$state = $instance['state'];
		$country = $instance['country'];
		$after_address = $instance['after_address'];

		echo $before_widget;
		if ($title) echo $before_title . $title . $after_title;

		echo '<div class="vcard">';
		if(!empty($before_address)) echo '<p>'.$before_address.'</p>';

		if(!empty($ci_name)) echo '<p class="vbefore"><a href="'.$url.'" class="fn url">'.$ci_name.'</a></p>';
		if(!empty($email) and !empty($ci_name)) echo '<p><a href="mailto:'.$email.'" class="email" title="'.sprintf(__('Mail to %s', 'ci_theme'), $ci_name).'">'.$email.'</a></p>';

		echo '<ul class="adr address-info">';

		if(!empty($address1)) echo '<li class="street-address">'.$address1.'</li>';
		if(!empty($address2)) echo '<li class="extended-address">'.$address2.'</li>';

		if(!empty($postcode) and !empty($city))
		{
			echo '<li><span class="postal-code">'.$postcode.'</span>, <span class="locality">'.$city.'</span></li>';
		}
		else
		{
			if(!empty($postcode)) echo '<li class="postal-code">'.$postcode.'</li>';
			if(!empty($city)) echo '<li class="locality">'.$city.'</li>';
		}
		if(!empty($state) and !empty($country))
		{
			echo '<li><span class="region">'.$state.'</span>, <span class="country-name">'.$country.'</span></li>';
		}
		else
		{
			if(!empty($state)) echo '<li class="region">'.$state.'</li>';
			if(!empty($country)) echo '<li class="country-name">'.$country.'</li>';
		}

		echo '</ul>';

		if(!empty($after_address)) echo '<p class="vafter">'.$after_address.'</p>';

		echo '</div>';

		echo $after_widget;
	} // widget

	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['before_address'] = stripslashes($new_instance['before_address']);
		$instance['ci_name'] = stripslashes($new_instance['ci_name']);
		$instance['url'] = esc_url($new_instance['url']);
		$instance['email'] = stripslashes($new_instance['email']);
		$instance['address1'] = stripslashes($new_instance['address1']);
		$instance['address2'] = stripslashes($new_instance['address2']);
		$instance['postcode'] = stripslashes($new_instance['postcode']);
		$instance['city'] = stripslashes($new_instance['city']);
		$instance['state'] = stripslashes($new_instance['state']);
		$instance['country'] = stripslashes($new_instance['country']);
		$instance['after_address'] = stripslashes($new_instance['after_address']);
		return $instance;
	} // save

	function form($instance){
		$defaults = array(
			'title' => '',
			'before_address' => '',
			'ci_name' => get_bloginfo('name'),
			'url' => get_site_url(),
			'email' => get_option('admin_email'),
			'address1' => '',
			'address2' => '',
			'postcode' => '',
			'city' => '',
			'state' => '',
			'country' => '',
			'after_address' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title = htmlspecialchars($instance['title']);
		$before_address = htmlspecialchars($instance['before_address']);
		$ci_name = htmlspecialchars($instance['ci_name']);
		$url = esc_url($instance['url']);
		$email = htmlspecialchars($instance['email']);
		$address1 = htmlspecialchars($instance['address1']);
		$address2 = htmlspecialchars($instance['address2']);
		$postcode = htmlspecialchars($instance['postcode']);
		$city = htmlspecialchars($instance['city']);
		$state = htmlspecialchars($instance['state']);
		$country = htmlspecialchars($instance['country']);
		$after_address = htmlspecialchars($instance['after_address']);

		echo '<p><label>' . __('Title:', 'ci_theme') . '</label><input id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" class="widefat" /></p>';
		echo '<p>'. __('All fields are optional. Postcode/City, and State/Country, are combined in one line separated by comma.', 'ci_theme') .'</p>';
		echo '<p><label>' . __('Before address text:', 'ci_theme') . '</label><textarea cols="20" rows="5" id="' . $this->get_field_id('before_address') . '" name="' . $this->get_field_name('before_address') . '" class="widefat">' . esc_textarea($before_address) . '</textarea></p>';
		echo '<p><label>' . __('Name:', 'ci_theme') . '</label><input id="' . $this->get_field_id('ci_name') . '" name="' . $this->get_field_name('ci_name') . '" type="text" value="' . esc_attr($ci_name) . '" class="widefat" /></p>';
		echo '<p><label>' . __('URL (linked to Name):', 'ci_theme') . '</label><input id="' . $this->get_field_id('url') . '" name="' . $this->get_field_name('url') . '" type="text" value="' . esc_attr($url) . '" class="widefat" /></p>';
		echo '<p><label>' . __('Email:', 'ci_theme') . '</label><input id="' . $this->get_field_id('email') . '" name="' . $this->get_field_name('email') . '" type="text" value="' . esc_attr($email) . '" class="widefat" /></p>';
		echo '<p><label>' . __('Address 1:', 'ci_theme') . '</label><input id="' . $this->get_field_id('address1') . '" name="' . $this->get_field_name('address1') . '" type="text" value="' . esc_attr($address1) . '" class="widefat" /></p>';
		echo '<p><label>' . __('Address 2:', 'ci_theme') . '</label><input id="' . $this->get_field_id('address2') . '" name="' . $this->get_field_name('address2') . '" type="text" value="' . esc_attr($address2) . '" class="widefat" /></p>';
		echo '<p><label>' . __('Postcode:', 'ci_theme') . '</label><input id="' . $this->get_field_id('postcode') . '" name="' . $this->get_field_name('postcode') . '" type="text" value="' . esc_attr($postcode) . '" class="widefat" /></p>';
		echo '<p><label>' . __('Town / City:', 'ci_theme') . '</label><input id="' . $this->get_field_id('city') . '" name="' . $this->get_field_name('city') . '" type="text" value="' . esc_attr($city) . '" class="widefat" /></p>';
		echo '<p><label>' . __('County / State:', 'ci_theme') . '</label><input id="' . $this->get_field_id('state') . '" name="' . $this->get_field_name('state') . '" type="text" value="' . esc_attr($state) . '" class="widefat" /></p>';
		echo '<p><label>' . __('Country:', 'ci_theme') . '</label><input id="' . $this->get_field_id('country') . '" name="' . $this->get_field_name('country') . '" type="text" value="' . esc_attr($country) . '" class="widefat" /></p>';
		echo '<p><label>' . __('After address text:', 'ci_theme') . '</label><textarea cols="20" rows="5" id="' . $this->get_field_id('after_address') . '" name="' . $this->get_field_name('after_address') . '" class="widefat">' . esc_textarea($after_address) . '</textarea></p>';

	} // form

} // class

register_widget('CI_Address');

endif; // !class_exists
?>
