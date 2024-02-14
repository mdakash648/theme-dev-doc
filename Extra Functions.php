<?php
function extractNumber($str) {
    // Regular expression to capture numbers with optional spaces and an optional plus sign
    $match = preg_match('/\(\s*([+-]?\d+)\s*\)/', $str, $matches);

    // If a match is found, return the number; otherwise, return 0
    return $match ? (int)$matches[1] : 0;
}

$a = "akash( 30 )";

$b = extractNumber($a); //oputput = 30

?>