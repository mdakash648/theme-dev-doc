<?php

function myespt_support_include() {
    load_theme_textdomain("ifmyespts");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
}
add_action("after_setup_theme", "myespt_support_include");

?>