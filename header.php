<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php ci_e_title(); ?></title>

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php // CSS files are loaded via /functions/styles.php ?>

	<?php // JS files are loaded via /functions/scripts.php ?>

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php do_action('after_open_body_tag'); ?>

<div id="mobile-bar">
	<a class="menu-trigger" href="#"></a>
	<?php ci_e_logo('<h1 class="logo">', '</h1>'); ?>
</div>

<div id="page">
	<header id="header">
		<div class="row">
			<hgroup class="logo three columns">
				<?php ci_e_logo('<h1>', '</h1>'); ?>
			</hgroup>

			<nav id="nav">
				<ul id="navigation" class="sf-menu group">

					<li><a class="scroll" href="#page"><?php _e('Home', 'ci_theme'); ?></a></li>
					
					<?php if ( !ci_setting('disable_about_section') ) : ?>
						<li><a class="scroll" href="#about"><?php ci_e_setting('about_menu_title'); ?></a></li>
					<?php endif; ?>

					<?php if ( !ci_setting('disable_speaker_section') ) : ?>
						<li><a class="scroll" href="#speakers"><?php ci_e_setting('speaker_menu_title'); ?></a></li>
					<?php endif; ?>

					<?php if ( !ci_setting('disable_schedule_section') ) : ?>
						<li><a class="scroll" href="#schedule"><?php ci_e_setting('schedule_menu_title'); ?></a></li>
					<?php endif; ?>

					<?php if ( !ci_setting('disable_sponsors_section') ) : ?>
						<li><a class="scroll" href="#sponsors"><?php ci_e_setting('sponsors_menu_title'); ?></a></li>
					<?php endif; ?>

					<?php if ( !ci_setting('disable_contact_section') ) : ?>
						<li><a class="scroll" href="#contact"><?php ci_e_setting('contact_menu_title'); ?></a></li>
					<?php endif; ?>
					
					<?php if ( !ci_setting('disable_registration_button') ) : ?>
						<?php if ( ci_setting('eventbrite_id') ) : ?>
							<li><a class="btn register" href="<?php echo 'http://www.eventbrite.com/event/' . ci_setting('eventbrite_id') . '?ref=ebtn'; ?>"><?php ci_e_setting('button_text'); ?></a></li>
						<?php else : ?>
							<li><a class="btn register scroll" href="#contact"><?php ci_e_setting('button_text'); ?></a></li>
						<?php endif; ?>
					<?php endif; ?>

				</ul><!-- #navigation -->
			</nav><!-- #nav -->
		</div> <!-- .row < #header -->
	</header>
