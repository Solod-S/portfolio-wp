<?php
get_header();
?>
<div id="page">
  <?php
  while (have_posts()):
    the_post();
    the_content();
  endwhile;

  get_template_part(slug: 'content');
  ?>

</div>
<?php
get_footer();
?>