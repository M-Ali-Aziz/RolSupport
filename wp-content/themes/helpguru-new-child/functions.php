<?php


function theme_enqueue_styles(){
	wp_enqueue_style('parent_style', get_template_directory_uri() . '/style.css');
	// wp_enqueue_style('parent_style2', get_template_directory_uri() . '/css/style.css');
	// wp_enqueue_style('parent_style3', get_template_directory_uri() . '/css/style.css');
	// wp_enqueue_style('parent_style4', get_template_directory_uri() . '/css/ht-kb.css');
	// wp_enqueue_style('parent_style', get_template_directory_uri() . '/css/style.css');


}

// function theme_enqueue_styles(){
// 	wp_enqueue_style('parent_style', get_template_directory_uri() . '/style.css');

// }


// function theme_enqueue_styles(){

// 	$parent_style = 'parent_style';

// 	wp_enqueue_style('$parent_style', get_template_directory_uri() . '/style.css');
// 	wp_enqueue_style('child_style', get_stylesheet_directory_uri() . '-child' . '/style.css',
// 		array($parent_style)
// 	);

// }

// function theme_enqueue_styles(){

// 	$parent_style = 'parent_style';

// 	wp_enqueue_style('$parent_style', get_template_directory_uri() . '/css/style.css');
// 	wp_enqueue_style('child_style', get_stylesheet_directory_uri() . '/style.css',
// 		array($parent_style)
// 	);

// }

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

