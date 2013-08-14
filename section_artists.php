<?php if ( !ci_setting('disable_artist_section') ) : ?>
	<section id="artists">
		<div class="row">
			<h1 class="section-title"><span><?php ci_e_setting('artist_title'); ?></span></h1>

			<?php $artist_q = new WP_Query( array(
				'post_type'=>'artist',
				'posts_per_page' => -1
			)); ?>

			<?php if ( $artist_q->have_posts() ) : while ( $artist_q->have_posts() ) : $artist_q->the_post(); ?>
				<article class="artist <?php ci_e_setting('artist_columns'); ?> mobile-two columns">
					<div class="artist-thumb">
						<?php the_post_thumbnail('square'); ?>
						<h3><?php the_title(); ?></h3>
					</div>
					<div class="artist-desc">
						<p class="artist-title"><?php the_title(); ?></p>
						<p class="artist-datetime"><?php ci_e_setting('perf_date_time'); ?></p>
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; endif; wp_reset_postdata(); ?>

		</div> <!-- .row < #artists -->
	</section> <!-- #artists -->
<?php endif; ?>
