<?php
/*
Plugin Name: My Plugin 1
Plugin URI: http://rolergo.com/my-plugin-1
Description: My first test plugin
Version: 1.0.0
Author: Mohammed Ali
Author URI: http://exemple.com
License: GPLv2 or later
*/

// Security Note: Consider blocking direct access to your plugin PHP files
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// a function to write Hello World! + a smily face
function say_hello_world($text){
	echo '<h1 style= color:red;>Hello World!</h1>' . '<img src="http://s3.amazonaws.com/somewherein/pictures/kamrunnaharbithi/kamrunnaharbithi-1434565806-341628b_xlarge.jpg" alt="Smiley face" width="100" height="100">';
	return $text;
}

// calling the functions
add_action('the_content', 'say_hello_world');



?>