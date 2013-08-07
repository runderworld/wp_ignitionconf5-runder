<?php if ( !ci_setting('disable_vendor_section') ) : ?>
	<section id="vendors">
		<div class="row">
			<h1 class="section-title"><span><?php ci_e_setting('vendor_title'); ?></span></h1>
			<ul class="vendor-list">

				<?php $vendor_q = new WP_Query( array(
					'post_type'=>'vendor',
					'posts_per_page' => -1
				));	?>
				
				<?php if ( $vendor_q->have_posts() ) : while ( $vendor_q->have_posts() ) : $vendor_q->the_post(); ?>
					<?php
						$on_schedule = post_custom('ci_cpt_vendor_target_blank');
						$vendor_url = post_custom('ci_cpt_vendor_url')
					?>
	
					<li class="<?php ci_e_setting('vendors_columns'); ?> columns">
						<?php if ( !empty($vendor_url) ) : ?>
							<a href="<?php echo $vendor_url; ?>" <?php if ( !empty($on_schedule) ) : ?>target="_blank"<?php endif; ?>>
						<?php endif; ?>

						<?php the_post_thumbnail('square'); ?>

						<?php if ( !empty($vendor_url) ) : ?>
							</a>
						<?php endif; ?>
					</li>
				<?php endwhile; endif; wp_reset_postdata(); ?>

			</ul>
		</div> <!-- .row < #vendors -->
	</section> <!-- #vendors -->
<?php endif; ?>
