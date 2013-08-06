<?php if ( !ci_setting('disable_contact_section') ) : ?>
	<section id="contact">
		<div class="row">
			<h1 class="section-title"><span><?php ci_e_setting('contact_title'); ?></span></h1>

			<div class="six columns">
				<?php
					global $post;
					$old_post = $post;
					$contact_page_id = ci_setting('m_contact_page');
					
					if( !empty($contact_page_id) )
					{
						$post = get_post($contact_page_id);
						setup_postdata($post);

						the_content();
	
						$post = $old_post;
						setup_postdata($post);
					}
				?>
			</div>

			<div class="six columns">
				<?php if ( !ci_setting('disable_map') ) : ?>
					<div id="map"></div>
				<?php endif; ?>

				<?php dynamic_sidebar('contact_widgets'); ?>
			</div>

		</div> <!-- .row < #contact -->
	</section> <!-- #contact -->
<?php endif; ?>
