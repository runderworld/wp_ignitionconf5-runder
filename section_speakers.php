<?php if ( !ci_setting('disable_speaker_section') ) : ?>
	<section id="speakers">
		<div class="row">
			<h1 class="section-title"><span><?php ci_e_setting('speaker_title'); ?></span></h1>

			<?php $spk_q = new WP_Query( array(
				'post_type'=>'speaker',
				'posts_per_page' => -1,
				'order' => 'ASC'
			)); ?>

			<?php if ( $spk_q->have_posts() ) : while ( $spk_q->have_posts() ) : $spk_q->the_post(); ?>
				<div class="twelve columns p-wrap">
					<article class="presentation">
						<div class="row">
							<div class="speaker-pres two columns">
								<?php the_post_thumbnail('square'); ?>
								<h3><?php the_title(); ?></h3>
							</div>
							<div class="desc nine columns">
								<h1><?php echo post_custom('ci_cpt_speaker_pres_title'); ?></h1>
								<?php echo wpautop(post_custom('ci_cpt_speaker_pres_desc')); ?>
							</div>
						</div>
					</article>
				</div>
			<?php endwhile; endif; // speaker loop ?>

			<?php wp_reset_postdata(); ?>

		</div> <!-- .row < #speakers -->
	</section> <!-- #speakers -->
<?php endif; ?>
