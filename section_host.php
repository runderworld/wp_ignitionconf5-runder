<?php if ( !ci_setting('disable_host_section') ) : ?>
	<section id="host">
		<div class="row">
			<div class="twelve columns">
				<h1 class="section-title"><span><?php ci_e_setting('host_title'); ?></span></h1>
				<div class="host-wrapper">
					<!--
					<div class="host-name"><?php ci_e_setting('host_name'); ?></div>
					-->
					
					<img class="host-photo" \
						src="<?php ci_e_setting('host_photo'); ?>" \
						title="<?php ci_e_setting('host_name'); ?>"\
					>
					
					<div class="host-desc"><?php ci_e_setting('host_desc_html'); ?></div>
				</div>
			</div>
		</div> <!-- .row < #host -->
	</section> <!-- #host -->
<?php endif; ?>
