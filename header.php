<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<!-- GCF for IE6- support (must be first meta)
  ================================================== -->
	<meta http-equiv="X-UA-Compatible" content="chrome=1">

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
			<hgroup class="logo columns">
				<?php ci_e_logo('<h1 style="display: inline-block;">', '</h1>'); ?>
				<h4 style="display: inline-block; margin: 0px 0px 0px 8px; font-size: 98%; font-style: normal;">Sept. 20th &amp; 21st, 2013</h4>
			</hgroup>

			<nav id="nav">
				<ul id="navigation" class="sf-menu group">

					<?php if ( !ci_setting('disable_about_section') ) : ?>
						<li><a class="scroll" href="#about"><?php ci_e_setting('about_menu_title'); ?></a></li>
					<?php endif; ?>

					<?php if ( !ci_setting('disable_keynote_section') ) : ?>
						<li><a class="scroll" href="#keynotes"><?php ci_e_setting('keynote_menu_title'); ?></a></li>
					<?php endif; ?>

					<?php if ( !ci_setting('disable_host_section') ) : ?>
						<li><a class="scroll" href="#host"><?php ci_e_setting('host_menu_title'); ?></a></li>
					<?php endif; ?>

					<?php if ( !ci_setting('disable_speaker_section') ) : ?>
						<li><a class="scroll" href="#speakers"><?php ci_e_setting('speaker_menu_title'); ?></a></li>
					<?php endif; ?>

					<?php if ( !ci_setting('disable_artist_section') ) : ?>
						<li><a class="scroll" href="#artists"><?php ci_e_setting('artist_menu_title'); ?></a></li>
					<?php endif; ?>

					<?php if ( !ci_setting('disable_schedule_section') ) : ?>
						<li><a class="scroll" href="#schedule"><?php ci_e_setting('schedule_menu_title'); ?></a></li>
					<?php endif; ?>

					<?php if ( !ci_setting('disable_vendor_section') ) : ?>
						<li><a class="scroll" href="#vendors"><?php ci_e_setting('vendor_menu_title'); ?></a></li>
					<?php endif; ?>

					<?php if ( !ci_setting('disable_contact_section') ) : ?>
						<li><a class="scroll" href="#contact"><?php ci_e_setting('contact_menu_title'); ?></a></li>
					<?php endif; ?>

					<?php if ( !ci_setting('disable_registration_button') ) : ?>
						<li><?php if ( false && ci_setting('eventbrite_id') ) :
								echo '<a class="btn register" href="http://www.eventbrite.com/event/'.ci_setting('eventbrite_id').'?ref=ebtn" target="_blank">';
							else :
								echo '<a class="btn register scroll" href="#registration">';
							endif; ?><?php ci_e_setting('button_text'); ?></a></li>
					<?php endif; ?>

				</ul><!-- #navigation -->
			</nav><!-- #nav -->
		</div> <!-- .row < #header -->
	</header>
