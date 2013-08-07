<?php if ( !ci_setting('disable_keynote_section') ) : ?>
	<section id="keynotes">
		<div class="row">
			<h1 class="section-title"><span><?php ci_e_setting('keynote_title'); ?></span></h1>

			<?php $keynote_q = new WP_Query( array(
				'post_type'=>'keynote',
				'posts_per_page' => -1
			)); ?>

			<?php if ( $keynote_q->have_posts() ) : while ( $keynote_q->have_posts() ) : $keynote_q->the_post(); ?>
				<article class="keynote <?php ci_e_setting('keynote_columns'); ?> mobile-two columns">
					<div class="keynote-thumb">
						<?php the_post_thumbnail('square'); ?>
						<h3><?php the_title(); ?></h3>
					</div>
					<div class="keynote-desc">
						<p class="keynote-title"><strong><?php the_title(); ?></strong></p>
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; endif; wp_reset_postdata(); ?>

		</div> <!-- .row < #keynotes -->
	</section> <!-- #keynotes -->
<?php endif; ?>
