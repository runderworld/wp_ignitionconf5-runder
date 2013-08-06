<?php if ( !ci_setting('disable_about_section') ) : ?>
	<section id="about">
		<div class="row">
			<div class="twelve columns">
				<h1 class="section-title"><span><?php ci_e_setting('about_title'); ?></span></h1>
				<?php
					global $post;
					$old_post = $post;
					$about_page_id = ci_setting('about_page');

					if( !empty($about_page_id) )
					{
						$post = get_post($about_page_id);
						setup_postdata($post);
						
						?><div class="about-text"><?php the_content(); ?></div><?php
						
						$post = $old_post;
						setup_postdata($post);
					}
				?>
			</div>
		</div> <!-- .row < #about -->
	</section> <!-- #about -->
<?php endif; ?>
