<?php if ( !ci_setting('disable_contact_section') ) : ?>
	<section id="contact">
		<div class="row">
			<h1 class="section-title"><span><?php ci_e_setting('contact_title'); ?></span></h1>
			<div style="text-align: center; margin: 0 auto;">
				<img src="<?php echo get_template_directory_uri(); ?>/images/contact_rock_church_ext.jpg" title="Rock Church Point Loma">
			</div>
			<div style="text-align: center; margin: 0 auto;">
				<h3>Rock Church - Point Loma Campus</h3>
				<p>2277 Rosecrans St.<br>San Diego, CA 92106</p>
				<a label="Get Directions" target="_blank" href="http://maps.google.com/maps?daddr=2277+Rosecrans+St.%0ASan+Diego%2C+CA+92106"><img src="http://maps.googleapis.com/maps/api/staticmap?size=195x113&zoom=15&markers=|2277+Rosecrans+St.%0ASan+Diego%2C+CA+92106&sensor=false&key=AIzaSyCxyHTvVQVNVFXz1QTTqoQhY8pY7M3zMnE"></a>
			</div>
		</div> <!-- .row < #contact -->
	</section> <!-- #contact -->
<?php endif; ?>
