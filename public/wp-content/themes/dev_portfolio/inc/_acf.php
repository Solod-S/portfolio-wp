<?php
// Добавляем функцию 'register_blocks' в хук 'acf/init' — сработает при инициализации ACF
add_action('acf/init', 'register_blocks');

function register_blocks()
{
  // Проверяем, существует ли функция acf_register_block_type (то есть активен ли плагин ACF PRO)
  if (function_exists('acf_register_block_type')) {

    // Регистрируем ACF-блок с типом 'hero'
    acf_register_block_type(array(
      'name' => 'hero', // Уникальное имя блока (slug)
      'title' => __('Hero'), // Название блока в админке
      'description' => __('A custom hero section block.'), // Описание блока
      'render_template' => 'blocks/home-page/hero.php', // Путь к PHP-шаблону для рендера блока
      'category' => 'portfolio-blocks', // Категория, в которую попадет блок (нужно зарегистрировать отдельно, если кастомная)
      'icon' => 'admin-generic', // Иконка блока в редакторе (можно использовать dashicons или SVG)

      // ❌ НЕ РАБОТАЕТ В АДМИНКЕ: Подключает стили ТОЛЬКО на фронте (можно удалить)
      // 'enqueue_styles' => get_template_directory_uri() . '/assets/scss/app.min.css',

      // ✅ ПРАВИЛЬНО: Подключает стили как в редакторе блоков (админка), так и на фронте
      'enqueue_assets' => function () {
        wp_enqueue_style(
          'hero-block-style', // Уникальный идентификатор стиля
          get_template_directory_uri() . '/assets/scss/app.min.css' // Путь к скомпилированному CSS-файлу
        );
      },

      'keywords' => array('hero', 'section'), // Ключевые слова для поиска блока в редакторе
    ));
  }
}
