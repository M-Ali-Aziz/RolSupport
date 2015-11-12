<?php
/*
Template Name: Support
*/
?>
<?php get_header(); ?>

<!-- Support page -->
<section id="homepage-features" class="clearfix" style="padding:40px 0 70% 0;">
<div class="ht-container">
<div class="ht-grid ht-grid-gutter-20">

<!-- Error Report -->
	<?php if (class_exists( 'HT_Knowledge_Base' )): ?>
	<div class="ht-grid-col ht-grid-6" style="margin-bottom:20px;">
	<a href="http://localhost/rol_support/?p=512">
		<div class="hf-block hf-kb-block" style="padding:40px 0;">
		<h4>Error report</h4>
		<h5>Click here to report an error.</h5>
		</div>
	</a>
	</div>
	<?php endif; ?>

<!-- Contact -->
 <?php if (class_exists( 'HT_Knowledge_Base' )): ?>
	<div class="ht-grid-col ht-grid-6" style="margin-bottom:20px;">
	<a href="http://localhost/rol_support/?p=118">
		<div class="hf-block hf-kb-block" style="padding:40px 0;">
		<h4>Contact</h4>
		<h5>Customer service and feedback</h5>
		</div>
	</a>
	</div>
	<?php endif; ?>

<!-- Error Report 2 -->
	<?php if (class_exists( 'HT_Knowledge_Base' )): ?>
	<div class="ht-grid-col ht-grid-6" style="margin-bottom:20px;">
	<a href="http://localhost/rol_support/?p=541">
		<div class="hf-block hf-kb-block" style="padding:40px 0;">
		<h4>Error report 2</h4>
		<h5>Click here to report an error.</h5>
		</div>
	</a>
	</div>
	<?php endif; ?>

<!-- Contact 2 -->
 <?php if (class_exists( 'HT_Knowledge_Base' )): ?>
	<div class="ht-grid-col ht-grid-6" style="margin-bottom:20px;">
	<a href="http://localhost/rol_support/?p=532">
		<div class="hf-block hf-kb-block" style="padding:40px 0;">
		<h4>Contact 2</h4>
		<h5>Customer service and feedback</h5>
		</div>
	</a>
	</div>
	<?php endif; ?>

	<!-- Error Report 3 -->
	<?php if (class_exists( 'HT_Knowledge_Base' )): ?>
	<div class="ht-grid-col ht-grid-6" style="margin-bottom:20px;">
	<a href="#">
		<div class="hf-block hf-kb-block" style="padding:40px 0;">
		<h4>Error report 3</h4>
		<h5>Click here to report an error.</h5>
		</div>
	</a>
	</div>
	<?php endif; ?>

<!-- Contact 3 -->
 <?php if (class_exists( 'HT_Knowledge_Base' )): ?>
	<div class="ht-grid-col ht-grid-6" style="margin-bottom:20px;">
	<a href="http://localhost/rol_support/?p=551">
		<div class="hf-block hf-kb-block" style="padding:40px 0;">
		<h4>Contact 3</h4>
		<h5>Customer service and feedback</h5>
		</div>
	</a>
	</div>
	<?php endif; ?>

</div>

</div>
</section>

<?php get_footer() ?>