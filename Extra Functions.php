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


//create excerpt
function excerptByWordCount($text, $word_count = 5, $more = '...') {
    // Matches tags and words
    preg_match_all('/<[^>]+>|[^<>\s]+/', $text, $matches);
    $words = $matches[0];
    $openTags = [];
    $wordCounter = 0;

    $truncated = [];
    foreach ($words as $word) {
        // Check if the word is a tag
        if (preg_match('/<(\w+)/', $word, $matchStart)) {
            // Opening tag
            array_push($openTags, $matchStart[1]);
        } elseif (preg_match('/<\/(\w+)/', $word, $matchEnd)) {
            // Closing tag, remove the last opened tag of the same type
            $lastTag = array_pop($openTags);
            if ($lastTag !== $matchEnd[1]) {
                // In case of improperly nested tags, attempt to correct
                $openTags = array_filter($openTags, function($tag) use ($matchEnd) {
                    return $tag !== $matchEnd[1];
                });
            }
        } else {
            // Count non-tag words
            $wordCounter++;
        }
        $truncated[] = $word;
        if ($wordCounter >= $word_count) {
            break;
        }
    }

    $truncatedText = implode(' ', $truncated) . ($wordCounter >= $word_count ? $more : '');

    // Close any unclosed tags
    while (!empty($openTags)) {
        $tag = array_pop($openTags);
        $truncatedText .= "</$tag>";
    }

    return $truncatedText;
}

//How to display Breadcrumb.
// install Breadcrumb NavXT plugin
if ( function_exists('bcn_display') ) {
    bcn_display();
} 
// display curunt page title
wp_title();//output : »blog

echo str_replace('»', '', wp_title('', false));//output : blog

?>