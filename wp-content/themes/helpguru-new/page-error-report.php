<?php
/*
Template name: Error Report Form
*/
?>
<?php get_header(); ?>

<section id="homepage-features" class="clearfix">
	<div class="ht-container">

		<!-- Error Report Form -->
		<section>
		<h1>Error Report</h1>
		<p>Please send us your error reprt by filling out the form below and we will get back with you shortly.</p>
		</section>

		<!-- The Form -->
		<section>
			<form id="error_report_form">

				<!-- Name -->
				<div>
					<label for="error_report_form_name"><i class="fa fa-user fa-2x"></i></label>
					<input type="text" name="error_report_form_name" id="error_report_form_name"  placeholder="Your Name" required>
				</div>
				<!-- Email -->
				<div>
					<label for="error_report_form_email"><i class="fa fa-envelope fa-2x"></i></label>
					<input type="email" name="error_report_form_email" id="error_report_form_email" placeholder="Your Email" required>
				</div>
				<!-- Product -->
				<div class="drop-down-holder" id="product_placeholder">
					<label for="error_report_form_product"><i class="fa fa-archive fa-2x"></i></label>
					<select name="error_report_form_product" id="error_report_form_product" required>
						<option selected disabled value="">Select a product</option>
						<option value="id/idrive">iD/iDrive</option>
						<option value="app-android">App - Android</option>
						<option value="app-ios">App - iOS</option>
					</select>
				</div>
				<!-- Hardware version -->
				<div class="drop-down-holder" id="hardware_version_placeholder">
					<label for="error_report_form_hardware_version"><i class="fa fa-hdd-o fa-2x"></i></label>
					<select name="error_report_form_hardware_version" id="error_report_form_hardware_version">
						<option selected disabled value="">Select a hardware version</option>
						<option value="3.1.0">3.1.0</option>
						<option value="2.1.0">2.1.0</option>
						<option value="1.1.0">1.1.0</option>
					</select>
				</div>
				<!-- Software version -->
				<div class="drop-down-holder" id="software_version_placeholder">
					<label for="error_report_form_software_version"><i class="fa fa-hdd-o fa-2x"></i></label>
					<select name="error_report_form_software_version" id="error_report_form_software_version">
						<option selected disabled value="">Select a software version</option>
						<option value="3.1.0">3.1.0</option>
						<option value="2.1.0">2.1.0</option>
						<option value="1.1.0">1.1.0</option>
					</select>
				</div>
				<!-- iD App version - Android -->
				<div class="drop-down-holder" id="id_app_version_android_placeholder">
					<label for="error_report_form_id_app_version_android"><i class="fa fa-tablet fa-2x"></i></label>
					<select name="error_report_form_id_app_version_android" id="error_report_form_id_app_version_android">
						<option selected disabled value="">Select a iD App version - Android</option>
						<option value="3.1.0">3.1.0</option>
						<option value="2.1.0">2.1.0</option>
						<option value="1.1.0">1.1.0</option>
					</select>
				</div>
				<!-- Android version - Mobile -->
				<div class="drop-down-holder" id="android_version_mobile_placeholder">
					<label for="error_report_form_android_version_mobile"><i class="fa fa-android fa-2x "></i></label>
					<select name="error_report_form_android_version_mobile" id="error_report_form_android_version_mobile">
						<option selected disabled value="">Android version - Mobile</option>
						<option value="marshmallow-(6.0)">Marshmallow (6.0)</option>
						<option value="lollipop-(5.0–5.1.1)">Lollipop (5.0–5.1.1)</option>
						<option value="kitKat-(4.4–4.4.4, 4.4W–4.4W.2)">KitKat (4.4–4.4.4, 4.4W–4.4W.2)</option>
						<option value="Other-(older version)">Other (older version)</option>
					</select>
				</div>
				<!-- iD App version - iOS -->
				<div class="drop-down-holder" id="id_app_version_ios_placeholder">
					<label for="error_report_form_id_app_version_ios"><i class="fa fa-tablet fa-2x"></i></label>
					<select name="error_report_form_id_app_version_ios" id="error_report_form_id_app_version_ios">
						<option selected disabled value="">Select a iD App version - iOS</option>
						<option value="3.1.0">3.1.0</option>
						<option value="2.1.0">2.1.0</option>
						<option value="1.1.0">1.1.0</option>
					</select>
				</div>
				<!-- iOS version - iPhone -->
				<div class="drop-down-holder" id="ios_version_iphone_placeholder">
					<label for="error_report_form_ios_version_iphone"><i class="fa fa-apple fa-2x"></i></label>
					<select name="error_report_form_ios_version_iphone" id="error_report_form_ios_version_iphone">
						<option selected disabled value="">iOS version - Mobile</option>
						<option value="(9.2)-beta">(9.2) Beta</option>
						<option value="9.1">9.1</option>
						<option value="8.3">8.3</option>
						<option value="Other-(older version)">Other (older version)</option>
					</select>
				</div>
				<!-- Subject -->
				<div>
					<label for="error_report_form_subject"><i class="fa fa-tag fa-2x"></i></label>
					<input type="text" name="error_report_form_subject" id="error_report_form_subject" placeholder="Subject" required>
				</div>
				<!-- Description -->
				<div>
					<label for="error_report_form_description"><i class="fa fa-file-text fa-2x"></i></i></label>
					<textarea rows="4" name="error_report_form_description" id="error_report_form_description" placeholder="Description" required></textarea>
				</div>

				<!-- File upload -->
				<div class="fileUploadHolder">
					<label for="error_report_file_input"><i class="fa fa-upload fa-2x"></i></label>
					<input name="error_report_file_input" id="error_report_file_input" type="file" multiple>
				</div>


				<!-- Submit button -->
				<div class="contact_form_submit_button">
					<input type="Submit" class="submit_button"  id="error_report_form_submit_button" role="button" value= "Send">
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
	wp_enqueue_script('myfunctions', get_template_directory_uri() . '/js/error-report-form.js');
	wp_enqueue_style('mystyles', get_template_directory_uri() . '/css/mystyles.css');
?>

<?php get_footer() ?>
