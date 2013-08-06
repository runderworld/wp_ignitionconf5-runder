<?php if ( !ci_setting('disable_schedule_section') ) : ?>
	<section id="schedule">
		<div class="row">
			<div class="twelve columns">
				<h1 class="section-title"><span><?php ci_e_setting('schedule_title'); ?></span></h1>
				<?php
					global $post;
					$old_post = $post;
					$schedule_page_id = ci_setting('schedule_page');

					if( !empty($schedule_page_id) )
					{
						$post = get_post($schedule_page_id);
						setup_postdata($post);
						
						?><div class="schedule-text"><?php the_content(); ?></div><?php
						
						$post = $old_post;
						setup_postdata($post);
					}
				?>
			</div>
		</div> <!-- .row #schedule -->
	</section> <!-- #schedule -->
<?php endif; ?>
