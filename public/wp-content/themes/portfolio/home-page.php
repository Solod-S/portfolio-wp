<?php
/*
Template Name: Home Page         // Название шаблона — будет отображаться в админке при выборе шаблона страницы
Template Post Type: page        // Указывает, что шаблон применим только к страницам (page), а не к постам
*/

// Добавляем стили, специфичные для шаблона главной страницы
add_action("wp_enqueue_scripts", function () {
  wp_enqueue_style(
    "home-page-style",                                        // Уникальный ID стиля
    get_template_directory_uri() . "/assets/css/home-page.css" // Путь к файлу стилей
  );
});

// Подключаем header.php (шапку сайта)
get_header();
?>

<!-- Контент шаблона — заголовок + контент из редактора WordPress -->
<h1>Home Page Template</h1>

<?php the_content(); // Вывод основного содержимого страницы из редактора ?>

<!-- Подключение дополнительного HTML-шаблона двумя способами -->

<?php require get_template_directory() . '/assets/html/grid.html'; ?>
<!-- Первый способ: подключение обычного HTML-файла напрямую через require -->

<?php get_template_part('template-parts/grid'); ?>
<!-- Второй способ (рекомендуемый в WordPress): подключение шаблона из папки template-parts -->
<!-- будет искать файл: wp-content/themes/your-theme/template-parts/grid.php -->

<?php get_footer(); // Подключение footer.php (подвала сайта) ?>