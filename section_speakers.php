<?php if ( !ci_setting('disable_speaker_section') ) : ?>
	<section id="speakers">
		<div class="row">
			<h1 class="section-title"><span><?php ci_e_setting('speaker_title'); ?></span></h1>

			<?php $spk_q = new WP_Query( array(
				'post_type'=>'speaker',
				'posts_per_page' => -1
			)); ?>

			<?php if ( $spk_q->have_posts() ) : while ( $spk_q->have_posts() ) : $spk_q->the_post(); ?>
				<article class="speaker <?php ci_e_setting('speaker_columns'); ?> mobile-two columns">
					<div class="speaker-thumb">
						<?php the_post_thumbnail('square'); ?>
						<h3><?php the_title(); ?></h3>
					</div>
					<div class="speaker-desc">
						<p class="speaker-title"><strong><?php the_title(); ?></strong></p>
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; endif; wp_reset_postdata(); ?>

		</div> <!-- .row < #speakers -->
	</section> <!-- #speakers -->
<?php endif; ?>
