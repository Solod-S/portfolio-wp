<?php

// Защита от прямого доступа к файлу
if (!defined('ABSPATH'))
  exit;

// Определяем константу версии темы, если она ещё не задана
if (!defined('_VERSION')) {
  define("_VERSION", "1.0.0");
}

// подключаем кастомные функции темы (скрипты + стили)
require get_template_directory() . '/inc/_custom.php';

// Post tYзpe — типы записей
require get_template_directory() . '/inc/_post_types.php';