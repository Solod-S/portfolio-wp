<?php
get_header();
the_post();
?>

<h1><?php the_title(); ?></h1>
<h4>Project Single</h4>
<?php the_content(); ?>

<?php get_footer(); ?>