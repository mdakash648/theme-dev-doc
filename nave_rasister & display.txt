//resister nav menu
register_nav_menu('main_menu', __('Main Menu', 'ifmyespts'));

//Display nav menu
$main_menu = wp_nav_menu(array('theme_location' => 'main_menu', 'menu_id' => 'mainMenu', 'menu_class' => 'dskMenu', 'echo' => true));

//if your want wordpress menu by default rapper html delete or replace
$main_menu = wp_nav_menu(array('theme_location' => 'main_menu', 'menu_id' => 'mainMenu', 'menu_class' => 'dskMenu', 'echo' => false));
$main_menu = str_replace(array('<div class="menu-main-menu-container">', '</div>'), '', $main_menu);
echo $main_menu;