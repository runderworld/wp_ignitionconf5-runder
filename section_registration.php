<?php if ( !ci_setting('disable_registration_button') ) : ?>
	<section id="registration">
		<div class="row">
			<div id="reg-register">
				<h1 class="section-title"><span>Registration</span></h1>
				<p>Thank you for attending ANTHEM Conference 2013!</p>
				<p>We are already hard at work planning for 2014 &mdash; information is forthcoming.</p>
				<?php
				/*
				<p>FRIDAY: Check-in and registration opens at 6pm in the Rock Park. Event is from 7pm to 9pm.</p>
				<p>SATURDAY: Check-in and registration opens at 7:30am in the Rock Park. Event is from 9am to 5pm.</p>
				*/
				?>
			</div>
			<?php
				/*
			<iframe src="http://www.eventbrite.com/tickets-external?eid=8438797671&ref=etckt&v=2"
					frameborder="0" height="214" width="98%" vspace="0" hspace="0"
					marginheight="5" marginwidth="5" scrolling="auto" allowtransparency="true"></iframe>
			*/
			?>
			<div id="reg-childcare">
				<h1 class="section-title"><span>Childcare</span></h1>
				<p>Childcare is available on-site during the conference for $5 per child.</p>
				<p><strong><u>UPDATE</u>: Childcare registration is now <u>CLOSED</u>.</strong></p>
				<?php
				/*
				<p style="padding-top: 20px;"><a class="btn" href="https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=NBNuH7SDjNJKXlFv/F/0Xw==&cCode=gu6bxUwJSpiBDyiUOfUi2A==" target="_blank">Register for Childcare<img class="extlink" src="<?php echo get_template_directory_uri(); ?>/images/extlink-16x16.png" title="Opens in a new window"></a></p>
				*/
				?>
			</div>
		</div> <!-- .row < #registration -->
	</section> <!-- #registration -->
<?php endif; ?>
