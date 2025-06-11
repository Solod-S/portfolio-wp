<?php
/**
 * Template Name: Home Page
 * Description: A custom template for the home page of the Dev Portfolio theme.
 */

get_header();

$title = get_field('hero_title');
$show_hero = get_field('show_hero');
// echo $show_hero;
?>

<?php if ($show_hero): ?>
  <section class="hero">
    <div class="container">
      <div class="hero-inner">
        <?php if ($title !== ''): ?>
          <h1><?php echo esc_html($title); ?></h1>
        <?php endif; ?>
      </div>
      <?php if (have_rows('hero_slider')): ?>
        <ul class="slides">
          <?php while (have_rows('hero_slider')):
            the_row();
            $title = get_sub_field('slider_title');
            $image = get_sub_field('image');
            ?>
            <li>
              <?php if ($title <> ''): ?>
                <h2 class="hero_slider-title"><?php echo $title ?></h2>
              <?php endif; ?>
              <img src="<?php echo $image['url']; ?>" alt="
        <?php echo $image['alt']; ?>" />
            </li>
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>

<?php get_footer(); ?>
<!-- <script>

  console.log('PHP-переменная:', $title);
</script> -->