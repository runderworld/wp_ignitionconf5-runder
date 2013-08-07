<?php if ( !ci_setting('disable_host_section') ) : ?>
	<section id="host">
		<div class="row">
			<div class="twelve columns">
				<h1 class="section-title"><span><?php ci_e_setting('host_title'); ?></span></h1>
				<?php
					global $post;
					$old_post = $post;
					$host_page_id = ci_setting('host_page');

					if( !empty($host_page_id) )
					{
						$post = get_post($host_page_id);
						setup_postdata($post);
						
						?><div class="host-text"><?php the_content(); ?></div><?php
						
						$post = $old_post;
						setup_postdata($post);
					}
				?>
			</div>
		</div> <!-- .row < #host -->
	</section> <!-- #host -->
<?php endif; ?>
