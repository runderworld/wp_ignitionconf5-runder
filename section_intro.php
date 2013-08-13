<?php if ( !ci_setting('disable_intro_section') ) : ?>
	<section id="intro">
		<div class="row">
			<div class="twelve columns">
				<div class="intro-content"><?php ci_e_setting('intro_content_html'); ?></div>
			</div>
		</div> <!-- .row < #intro -->
	</section> <!-- #intro -->
<?php endif; ?>
