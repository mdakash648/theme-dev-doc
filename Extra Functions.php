<?php

//filter only number from any text like bangladesh(50), india(40)
function extractNumber($str) {
    // Regular expression to capture numbers with optional spaces and an optional plus sign
    $match = preg_match('/\(\s*([+-]?\d+)\s*\)/', $str, $matches);

    // If a match is found, return the number; otherwise, return 0
    return $match ? (int)$matches[1] : 0;
}

$a = "akash( 30 )";

$b = extractNumber($a); //oputput = 30

//create shortcode for your template

function menu_template() {
    ob_start();
    get_template_part('menu_template'); //if your template inside of folder than use inc/menu_template
    return ob_get_clean();
}
add_shortcode('special_offer', 'menu_template'); 

?>