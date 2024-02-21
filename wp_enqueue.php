<?php

function myespt_css_js() {
    // CSS
	wp_enqueue_style('wpcore', get_template_directory_uri().'/assets/css/wp-core.css');
     	wp_enqueue_style('Main-style', get_template_directory_uri().'/assets/css/style.css', array(), null, 'all');//get_stylesheet_directory_uri() use this function for child theme root directory
    	wp_enqueue_style('myespt-style', get_stylesheet_uri());//this is root path style.css 
   
    // JS
    	wp_enqueue_script('jquery');//this is jaquery // Note : Sometimes wordpress jquery.js your theme doesn't work, then use your jquery file.
       	wp_enqueue_script('mainJS', get_template_directory_uri().'/assets/js/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'myespt_css_js');

//if you want connect your css and js in header.php
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/style.css">


?>

