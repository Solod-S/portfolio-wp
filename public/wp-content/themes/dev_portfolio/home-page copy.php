<?php
/**
 * Template Name: Home Page
 * Description: A custom template for the home page of the Dev Portfolio theme.
 */

// Подключение заголовка темы (header.php)
get_header();

// Получаем значение поля "hero_title" (текст заголовка героя) из ACF
$title = get_field('hero_title');

// Получаем булево значение поля "show_hero" (показывать ли блок героя)
$show_hero = get_field('show_hero');
// echo $show_hero; // Раскомментировать для отладки
?>

<?php if ($show_hero): // Если флаг "показывать героя" включен ?>
  <section class="hero">
    <div class="container">
      <div class="hero-inner">
        <?php if ($title !== ''): // Если заголовок не пустой ?>
          <h1><?php echo esc_html($title); // Выводим заголовок, экранируя HTML ?></h1>
        <?php endif; ?>
      </div>

      <?php if (have_rows('hero_slider')): // Если есть слайды (повторяющееся поле "hero_slider") ?>
        <ul class="slides">
          <?php while (have_rows('hero_slider')): // Цикл по всем слайдам
                  the_row();

                  // Получаем заголовок и изображение для текущего слайда
                  $title = get_sub_field('slider_title');
                  $image = get_sub_field('image');
                  ?>
            <li>
              <?php if ($title <> ''): // Если заголовок слайда не пустой ?>
                <h2 class="hero_slider-title"><?php echo $title ?></h2>
              <?php endif; ?>

              <!-- Вывод изображения слайдера -->
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            </li>
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>

<?php
// Подключение подвала темы (footer.php)
get_footer();
?>

<!-- 
<script>
  // Пример вывода PHP-переменной в JS (не работает в текущем виде, т.к. PHP выполняется на сервере)
  // console.log('PHP-переменная:', $title);
</script> 
-->