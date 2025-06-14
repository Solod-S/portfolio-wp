<?php
/**
 * Template Name: Home Page
 * Description: A custom template for the home page of the Dev Portfolio theme.
 */

get_header(); ?>

<!-- Hero section to page (нужно настраивать еще и параметры где отображать в админке) -->
<?php // get_template_part('template-parts/home-page-hero', "hero") ?>


<?php the_content() ?>

<?php echo do_shortcode('[contact-form-7 id="6f56b07" title="Contact form 1"]'); ?>


<?php get_footer(); ?>