<?php 
// add option use ACF
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Site Setting',
        'menu_title'    => 'Site Setting',
        'menu_slug'     => 'theme-option-settings',
        'capability'    => 'edit_theme_options',
        'position'      => 80,
        'redirect'      => true
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-option-settings',
        'capability'    => 'edit_theme_options',
    ));
}
?>

// link this acf.php file in functions.php
require_once 'assets/inc/acf.php';
