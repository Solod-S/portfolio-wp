<?php
get_header();
?>
<div id="page">
  <?php
    while (have_posts()) :
        the_post();
            the_title('<h1 class="entry-title">', '</h1>');
        the_content();
    endwhile;


    ?>

</div>
<?php
get_footer();
?>





  
