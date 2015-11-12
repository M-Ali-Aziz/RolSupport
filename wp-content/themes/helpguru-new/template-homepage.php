<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<!-- #page-header -->
<section id="page-header" class="clearfix ph-align-center ph-large">
<div class="ht-container">
<?php if (get_theme_mod( 'ht_hp_headline' )) : ?><h2 id="page-header-title"><?php echo get_theme_mod( 'ht_hp_headline', __( 'The self-service support theme', 'ht-theme' ) ); ?></h2><?php endif; ?>
<?php if (get_theme_mod( 'ht_hp_tagline' )) : ?><h3 id="page-header-tagline"><?php echo get_theme_mod( 'ht_hp_tagline', __( 'A premium WordPress theme with integrated Knowledge Base, providing 24/7 community based support.', 'ht-theme' ) ); ?></h3><?php endif; ?>

<?php 
if (class_exists( 'HT_Knowledge_Base' )):
if ( $ht_knowledge_base_options['search-display'] ): ?>
	<div id="ht-kb-search" class="clearfix">
	  	<?php ht_kb_display_search(); ?>
	</div>
<?php 
endif;
endif;  ?>

</div>
</section>
<!-- /#page-header -->




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
	$ht_hpf_col = 'ht-grid-4';
}
?>

<div class="ht-grid ht-grid-gutter-20">

	<?php if (class_exists( 'HT_Knowledge_Base' )): ?>
	<div class="ht-grid-col <?php echo $ht_hpf_col; ?>">
	<a href="http://localhost/rol_support/article-categories/id/">
		<div class="hf-block hf-kb-block">
		<!-- <i class="fa fa-cube"></i> -->
		<i class="fa">
			<img style="max-width:70px; float:left;" src="wp-content/themes/helpguru-new/images/desk.png">
		</i>
		<h4>iD</h4>
		<h5>Articles / Instlations / ...</h5>
		</div>
	</a>
	</div>
	<?php endif; ?>


 <?php if (class_exists( 'HT_Knowledge_Base' )): ?>
	<div class="ht-grid-col <?php echo $ht_hpf_col; ?>">
	<a href="http://localhost/rol_support/article-categories/idrive/">
		<div class="hf-block hf-kb-block">
		<!-- <i class="fa fa-cogs"></i> -->
		<i class="fa">
			<img style="max-width:70px; float:left;" src="wp-content/themes/helpguru-new/images/drive.png">
		</i>
		<h4>iDrive</h4>
		<h5>Articles / Instraction / ...</h5>
		</div>
	</a>
	</div>
	<?php endif; ?>


 <?php if (class_exists( 'HT_Knowledge_Base' )): ?>
	<div class="ht-grid-col <?php echo $ht_hpf_col; ?>">
	<a href="http://localhost/rol_support/article-categories/app/">
		<div class="hf-block hf-kb-block">
		<!-- <i class="fa fa-mobile"></i> -->
		<i class="fa">
		<img style="max-width:70px; float:left;" src="wp-content/themes/helpguru-new/images/app.png">
		</i>
		<h4>App</h4>
		<h5>Articles / Instlations / ...</h5>
		</div>
	</a>
	</div>
	<?php endif; ?>

</div>

</div>
</section>
<!-- /#homepage-Getting Started -->


<!-- #homepage-features -->
<section id="homepage-features" class="clearfix">
<div class="ht-container">

<?php
// Get index ID
$ht_index_id = get_option('page_for_posts');

// Get post counts
$ht_count_posts = wp_count_posts();
$ht_count_posts = $ht_count_posts->publish;

// Get category number
$ht_count_category = get_terms( 'category');
if ( !is_wp_error( $ht_count_category ) ) {
	$ht_count_category = count($ht_count_category);
} else {
	$ht_count_category = 0;
}

if (class_exists( 'HT_Knowledge_Base' )):
// Get kb post counts
$ht_count_kbposts = wp_count_posts('ht_kb');
$ht_count_kbposts = $ht_count_kbposts->publish;
// Get kb category number
$ht_count_kbcategory = get_terms( 'ht_kb_category');
if ( !is_wp_error( $ht_count_kbcategory ) ) {
	$ht_count_kbcategory = count($ht_count_kbcategory);
} else {
	$ht_count_kbcategory = 0;
}
endif; 

if (class_exists( 'bbPress' )):
// Get forum topcs counts
$ht_count_bbp_topics = wp_count_posts('topic');
$ht_count_bbp_topics = $ht_count_bbp_topics->publish;

// Get forum post counts
$ht_count_bbp_reply = wp_count_posts('reply');
$ht_count_bbp_reply = $ht_count_bbp_reply->publish;
endif; 

// Get number of blocks
$ht_hpf_count = 1;
if (class_exists( 'HT_Knowledge_Base' )):
$ht_hpf_count++;
endif; 
if (class_exists( 'bbPress' )):
$ht_hpf_count++;
endif; 

// Set column variable
if ( $ht_hpf_count == 1) {
	$ht_hpf_col = 'ht-grid-12';
} elseif ( $ht_hpf_count == 2) {
	$ht_hpf_col = 'ht-grid-6';
} else {
	$ht_hpf_col = 'ht-grid-4';
}
?>

<div class="ht-grid ht-grid-gutter-20">

	<?php if (class_exists( 'HT_Knowledge_Base' )): ?>
	<div class="ht-grid-col <?php echo $ht_hpf_col; ?>">
	<a href="<?php echo get_post_type_archive_link( 'ht_kb' ) ?>">
		<div class="hf-block hf-kb-block">
		<!-- <i class="fa fa-folder-o"></i> -->
		<img style="max-width: 20vw;" src="wp-content/themes/helpguru-new/images/applications-office.png">
		<h4><?php _e( 'Browse by topic', 'ht-theme' ); ?></h4>
		<h5><?php echo $ht_count_kbposts; ?> <?php _e( 'Articles', 'ht-theme' ); ?>  /  <?php echo $ht_count_kbcategory; ?> <?php _e( 'Categories', 'ht-theme' ); ?></h5>
		</div>
	</a>
	</div>
	<?php endif; ?>

	<!-- #homepage-widgets -->
	<section id="homepage-widgets" class="clearfix">
	<div class="ht-container">

	<?php if ( is_active_sidebar( 'ht_homepage_widgets' ) ) { ?>
	<div class="ht-grid ht-grid-gutter-20 ht-grid-gutter-bottom-40">
		<?php dynamic_sidebar( 'ht_homepage_widgets' ); ?>
	</div>	
	<?php } ?>

	</div>
	</section>
	<!-- /#homepage-widgets -->


	<!--
	<?php if (class_exists( 'bbPress' )): ?>
	<div class="ht-grid-col <?php echo $ht_hpf_col; ?>">
	<a href="<?php echo get_post_type_archive_link( 'forum' ); ?>">
		<div class="hf-block hf-forum-block">
		<i class="fa fa-comment-o"></i>
		<img src="wp-content/themes/helpguru/images/team.png">
		<h4><?php _e( 'Forums', 'ht-theme' ); ?></h4>
		<h5><?php echo $ht_count_bbp_topics; ?> <?php _e( 'Topics', 'ht-theme' ); ?>  /  <?php echo $ht_count_bbp_reply; ?> <?php _e( 'Posts', 'ht-theme' ); ?></h5>
		</div>
	</a>
	</div>
	<?php endif; ?>

	<?php $ht_index_id = get_option('page_for_posts'); ?>
	<div class="ht-grid-col <?php echo $ht_hpf_col; ?>">
	<a href="<?php echo get_permalink( $ht_index_id ); ?>">
		<div class="hf-block hf-posts-block">
		<i class="fa fa-bullhorn"></i>
		<img src="wp-content/themes/helpguru/images//news.png">
		<h4><?php echo get_the_title($ht_index_id); ?></h4>
		<h5><?php echo $ht_count_posts; ?> <?php _e( 'Posts', 'ht-theme' ); ?>  /  <?php echo $ht_count_category; ?> <?php _e( 'Categories', 'ht-theme' ); ?></h5>
		</div>
	</a>
	</div> -->
</div>
 
</div>
</section>
<!-- /#homepage-features -->



<!-- #homepage-widgets -->
<!-- <section id="homepage-widgets" class="clearfix">
<div class="ht-container">

<?php if ( is_active_sidebar( 'ht_homepage_widgets' ) ) { ?>
<div class="ht-grid ht-grid-gutter-20 ht-grid-gutter-bottom-40">
	<?php dynamic_sidebar( 'ht_homepage_widgets' ); ?>
</div>	
<?php } ?>

</div>
</section> -->
<!-- /#homepage-widgets -->

<?php get_footer(); ?>