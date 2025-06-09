<?php
// Register menus
function dev_portfolio_register_menus()
{
  register_nav_menus(array(
    'header_menu' => "Header Menu",
    "footer_menu" => "Footer Menu",

  ));
}

add_action('after_setup_theme', 'dev_portfolio_register_menus');