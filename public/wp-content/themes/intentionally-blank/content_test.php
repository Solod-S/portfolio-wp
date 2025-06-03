<?php
// have_posts() - есть ли записи для вывода
if (have_posts()) {

  while (have_posts()) {
    // the_post() - устанавливает сл пост в цикле
    the_post();
    ?>
    <!-- the_ID - выводит id поста -->

    <!-- post_class - выводит классы поста -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php
      // the_title - выводит заголовок
      the_title('<h1 class="entry-title">', '</h1>');
      // the_content(); - выводит все блоки страницы
      the_content();

      // если есть теги
      if (has_tag()) {
        echo '<p class="tags">';
        the_tags();
        echo '<p/>';
      }

      // если есть категория
      if (has_category()) {
        echo '<p class="categories">';
        the_category();
        echo '<p/>';
      }

      // если есть краткое описание
      if (has_excerpt()) {
        echo '<p class="excerpt">';
        the_excerpt();
        echo '<p/>';
      }

      ?>
    </article>
    <?php
  }
} ?>