<?php if ( !ci_setting('disable_slider_section') ) : ?>

	<?php $sld_q = new WP_Query( array(
		'post_type'=>'slider',
		'posts_per_page' => -1
	)); ?>

	<div id="sliders">

		<div id="image-slider" class="flexslider">
			<ul class="slides group">
				<?php while ( $sld_q->have_posts() ) : $sld_q->the_post(); ?>
					<li><?php the_post_thumbnail('full'); ?></li>
				<?php endwhile; ?>
				<?php //$sld_q->rewind_posts(); ?>
			</ul>
		</div>

		<div id="main-slider" class="flexslider">
			<ul class="slides group">
				<?php while ( $sld_q->have_posts() ) : $sld_q->the_post(); ?>
					<li>
						<div class="slide-content">
							<span class="head"><?php echo post_custom('ci_cpt_slider_super_title'); ?></span>
							<h2 class="slide-title"><?php the_title(); ?></h2>
							<span class="sub-head"><?php echo post_custom('ci_cpt_slider_subtitle'); ?></span>
						</div>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		</div>

	</div> <!-- #sliders -->

<?php endif; ?>
