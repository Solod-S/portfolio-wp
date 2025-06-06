<?php

// Регистрируем функцию 'portfolio_scripts', которая будет вызываться при подключении скриптов и стилей
add_action('wp_enqueue_scripts', 'portfolio_scripts');

// Объявляем саму функцию, которая отвечает за подключение CSS и JS
function portfolio_scripts()
{
  // Подключаем основной файл стилей темы (CSS)
  // Путь к файлу: /wp-content/themes/название_темы/assets/scss/app.css
  // _VERSION добавляется в конец URL как параметр версии, чтобы избежать кэширования
  wp_enqueue_style('portfolio-style', get_template_directory_uri() . '/assets/scss/app.css', array(), _VERSION, 'all');

  // Убеждаемся, что jQuery будет загружен (WordPress включает свою версию jQuery)
  wp_enqueue_script('jquery');

  // Подключаем основной JS-файл темы
  // Путь к файлу: /wp-content/themes/название_темы/assets/js/app.js
  // true в конце — значит скрипт будет подключён внизу страницы перед </body>
  wp_enqueue_script('portfolio-script', get_template_directory_uri() . '/assets/js/app.js', array(), _VERSION, true);
}
