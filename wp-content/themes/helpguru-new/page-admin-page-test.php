<?php
/*
Template Name: Admin test
*/
?>
<?php get_header() ?>


<section id="homepage-features" class="clearfix">
	<div class="ht-container">

		<h1>Hello Admin!!!</h1>



		<h3 align="center">Contact Form data:</h3>
<table border="1" align="center">
   <tr>
       <td> <input type="button" id="display" value="Display All Data from Contact Form" /> </td>
   </tr>
</table>
<div id="responsecontainer" align="center">

</div>




	</div>
</section>

<?php
	wp_enqueue_script('myfunctions', get_template_directory_uri() . '/js/functionTest.js');
	wp_enqueue_style('mystyles', get_template_directory_uri() . '/css/mystyles.css');
?>

<?php get_footer() ?>
