<?php
/**
 * The base (and only) template
 *
 * @package WordPress
 * @subpackage intentionally-blank
 */



$blank_show_footer = get_theme_mod('blank_show_copyright', true);
$blank_show_header = get_theme_mod('header_text', false);
$blank_description = get_bloginfo('description', 'display');

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>><?php wp_body_open(); ?>