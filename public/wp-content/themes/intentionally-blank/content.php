<?php
// Получаем все посты (без ограничения количества)
$posts = get_posts([
  'numberposts' => -1,         // -1 означает, что нужно получить все посты
  'post_type' => 'post',     // Тип контента — обычные записи (не страницы и не произвольные типы)
  'orderby' => 'date',     // Сортируем по дате публикации
  'order' => 'DESC',     // В порядке от новых к старым
]);

// Проходим по всем постам в цикле
foreach ($posts as $post) {
  setup_postdata($post); // Устанавливаем глобальные переменные WP ($post и т.д.), чтобы использовать шаблонные теги (the_title, the_permalink и т.д.)
  ?>

  <!-- Карточка одного поста -->
  <article style="background: #f4f4f4; padding: 30px; margin-bottom: 30px; overflow: hidden;">

    <?php if (has_post_thumbnail()): // Если у поста есть изображение-превью ?>
      <div style="float: left; margin-right: 20px;">
        <?php the_post_thumbnail('medium'); // Выводим миниатюру поста (размер medium) ?>
      </div>
    <?php endif; ?>

    <!-- Заголовок поста с ссылкой на сам пост -->
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <?php if (has_excerpt()): // Если у поста есть краткое описание ?>
      <p class="excerpt"><?php the_excerpt(); // Выводим краткое описание ?></p>
    <?php endif; ?>
    <?php the_content(); ?>
    <?php if (has_tag()): // Если у поста есть теги ?>
      <p class="tags">Tags: <?php the_tags('', ', '); // Выводим список тегов, разделённых запятыми ?></p>
    <?php endif; ?>

    <?php if (has_category()): // Если у поста есть категории ?>
      <p class="categories">Categories: <?php the_category(', '); // Выводим список категорий, разделённых запятыми ?></p>
    <?php endif; ?>

  </article>

<?php }
// Сбрасываем глобальную переменную $post, чтобы не повлиять на остальной шаблон
wp_reset_postdata();
?>