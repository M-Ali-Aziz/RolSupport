<?php
/*
Template Name: Form
*/
?>
<?php get_header(); ?>

<!-- <section id="homepage-features" class="clearfix">
	<div class="ht-container"> -->
<section>
	<div>
		<section>
		<h1>Contact Page</h1>
		<p>This is just a test page of page-template for a form.</p>
		</section>

		<section>
			<form id="form-test1">

				<div>
					<label for="name">Your Name</label>
					<input type="text" name="name" id="name">
				</div>

				<!-- <div>
					<label for="name"><i class="fa fa-user fa-3x" style="display:inline-block; padding:0 10px 0 0;"></i></label><input type="text" name="name" id="name"  placeholder="Your Name">
				</div> -->

				<div>
					<label for="email">Email</label>
					<input type="email" name="email" id="email">
				</div>

				<div>
					<label for="email">Select</label>

					<select>
						<option>select a number</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
					</select>
				</div>
				
				<div>
					<label for="subject">subject</label>
					<input type="text" name="subject" id="subject">
				</div>

				<div>
					<label for="description">Description</label>
					<textarea rows="4" name="description" id="description"></textarea>
				</div>

				<div>
					<input type="Submit" id="submit_button" role="button">
				</div>

			</form>
		</section>

	</div>
</section>

<?php
	wp_enqueue_script('myfunctions', get_template_directory_uri() . '/js/myfunctions.js');
	wp_enqueue_style('mystyles', get_template_directory_uri() . '/css/mystyles.css');
?>

<?php get_footer(); ?>