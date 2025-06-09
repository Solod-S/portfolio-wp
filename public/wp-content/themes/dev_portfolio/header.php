<?php
/**
 * The header for our theme
 * @package goit
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header>
        <div class="container">
            <a href="<?php echo home_url(); ?>" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo">

            </a>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header_menu',
                "menu_id" => 'header-menu',
                'container' => 'nav',
                'menu_class' => 'header-menu',
                "items_wrap" => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                // 'fallback_cb' => false,
                // 'depth' => 1,
            ));
            ?>
        </div>
    </header>