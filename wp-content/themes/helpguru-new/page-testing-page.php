<?php
/*
Template Name: Testing Page
*/
?>
<?php get_header(); ?>

<!-- #homepage-Getting Started -->
<section id="homepage-features" class="clearfix">
<div class="ht-container">

<?php
// Set column variable

if ( $ht_hpf_count == 1) {
	$ht_hpf_col = 'ht-grid-12';
} elseif ( $ht_hpf_count == 2) {
	$ht_hpf_col = 'ht-grid-6';
} else {
	$ht_hpf_col = 'ht-grid-6';
}
?>


<div class="ht-grid ht-grid-gutter-20">

	<?php if (class_exists( 'HT_Knowledge_Base' )): ?>
	<div class="ht-grid-col <?php echo $ht_hpf_col; ?>">
	<a href="#">
		<div class="hf-block hf-kb-block">
		<!-- <i class="fa fa-cube"></i> -->
		<!-- <i class="fa">
			<img style="max-width:70px; float:left;" src="wp-content/themes/helpguru-new/images/desk.png">
		</i> -->
		<h4>Eror report</h4>
		<h5>Click here to report an error.</h5>
		</div>
	</a>
	</div>
	<?php endif; ?>

	<div style:"hight: 20px; width: 200px; border: 1px solid black;"></div>

 <?php if (class_exists( 'HT_Knowledge_Base' )): ?>
	<div class="ht-grid-col <?php echo $ht_hpf_col; ?>">
	<a href="http://localhost/rol_support/?p=118">
		<div class="hf-block hf-kb-block">
		<!-- <i class="fa fa-cogs"></i> -->
		<!-- <i class="fa">
			<img style="max-width:70px; float:left;" src="wp-content/themes/helpguru-new/images/drive.png">
		</i> -->
		<h4>Contact</h4>
		<h5>Customer service and feedback</h5>
		</div>
	</a>
	</div>
	<?php endif; ?>


</div>

</div>
</section>

<!-- /#homepage-Getting Started -->


<?php get_footer(); ?>