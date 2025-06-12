<?php
/**
 * Template Name: Home Page
 * Description: A custom template for the home page of the Dev Portfolio theme.
 */

get_header(); ?>

<!-- Hero section to page (нужно настраивать еще и параметры где отображать в админке) -->
<?php // get_template_part('template-parts/home-page-hero', "hero") ?>

<?php the_content() ?>

<?php get_footer(); ?>