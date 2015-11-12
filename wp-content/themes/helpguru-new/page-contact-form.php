<?php
/*
Template Name: Contact Form
*/
?>

<!-- Get Header -->
<?php get_header(); ?>

<section id="homepage-features" class="clearfix">
	<div class="ht-container">

		<!-- Contact Form -->
		<section>
		<h1>Contact</h1>
		<p>Please send us a message/feedback by filling out the form below and we will get back with you shortly.</p>
		</section>

		<!-- The Form -->
		<section>
			<form id="contact_form">
				<!-- Name -->
				<div>
					<label for="contact_form_name"><i class="fa fa-user fa-2x"></i></label>
					<input type="text" name="contact_form_name" id="contact_form_name"  placeholder="Your Name" required>
				</div>
				<!-- Email -->
				<div>
					<label for="contact_form_email"><i class="fa fa-envelope fa-2x"></i></label>
					<input type="email" name="contact_form_email" id="contact_form_email" placeholder="Your Email" required>
				</div>
				<!-- Subject -->
				<div>
					<label for="contact_form_subject"><i class="fa fa-tag fa-2x"></i></label>
					<input type="text" name="contact_form_subject" id="contact_form_subject" placeholder="Subject" required>
				</div>
				<!-- Description -->
				<div>
					<label for="contact_form_description"><i class="fa fa-file-text fa-2x"></i></i></label>
					<textarea rows="4" name="contact_form_description" id="contact_form_description" placeholder="Description" required></textarea>
				</div>

				<!-- File upload -->
				<!-- <div>
					<label></label>
					<input id="fileUpload" type="file">
				</div> -->
				<!-- Submit button -->
				<div class="contact_form_submit_button">
					<input type="submit" id="contact_form_submit_button" role="button" value="Send">
					<!-- success message -->
					<div class="successMessage" style="display: none;">Successfully send!</div>
					<!-- error message -->
					<div class="errorMessage" style="display: none;">Failed to send!!!</div>
				</div>


			</form>
		</section>

	</div>
</section>

<?php
	wp_enqueue_script('myfunctions', get_template_directory_uri() . '/js/myfunctions.js');
	wp_enqueue_style('mystyles', get_template_directory_uri() . '/css/mystyles.css');
?>

<!-- Get Footer -->
<?php get_footer() ?>
