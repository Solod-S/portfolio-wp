<?php
get_header();
?>

<section class="container">
  <div class="row">
    <section class="container">
      <div class="row">
        <div class="col-md-12">
          <h1><?php _e('Projects', 'Dev Portfolio') ?></h1>

        </div>
        <?php if (have_posts()): ?>

          <?php while (have_posts()):
            the_post(); ?>
            <div class="col-md-4">
              <a href="<?php the_permalink(); ?>">
                <h2><?php the_title(); ?></h2>
              </a>
            </div>
          <?php endwhile; ?>

        <?php endif; ?>
      </div>
    </section>
  </div>
  </div>
</section>

<?php get_footer(); ?>