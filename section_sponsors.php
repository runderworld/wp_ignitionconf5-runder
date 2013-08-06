<?php if ( !ci_setting('disable_schedule_section') ) : ?>
	<section id="sponsors">
		<div class="row">
			<h1 class="section-title"><span><?php ci_e_setting('sponsors_title'); ?></span></h1>
			<ul class="sponsor-list">

				<?php $spns_q = new WP_Query( array(
					'post_type'=>'sponsor',
					'posts_per_page' => -1
				));	?>
				
				<?php if ( $spns_q->have_posts() ) : while ( $spns_q->have_posts() ) : $spns_q->the_post(); ?>
					<?php
						$on_schedule = post_custom('ci_cpt_sponsor_target_blank');
						$sponsor_url = post_custom('ci_cpt_sponsor_url')
					?>
	
					<li class="<?php ci_e_setting('sponsors_columns'); ?> columns">
						<?php if ( !empty($sponsor_url) ) : ?>
							<a href="<?php echo $sponsor_url; ?>" <?php if ( !empty($on_schedule) ) : ?>target="_blank"<?php endif; ?>>
						<?php endif; ?>

						<?php the_post_thumbnail('square'); ?>

						<?php if ( !empty($sponsor_url) ) : ?>
							</a>
						<?php endif; ?>
					</li>
				<?php endwhile; endif; wp_reset_postdata(); ?>

			</ul>
		</div> <!-- .row < #sponsors -->
	</section> <!-- #sponsors -->
<?php endif; ?>
