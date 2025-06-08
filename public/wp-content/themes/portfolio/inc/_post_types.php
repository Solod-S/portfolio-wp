<?php

// Функция для регистрации кастомных типов записей
function register_post_types()
{
  // Регистрация пользовательского типа записи "project"
  register_post_type('project', array(
    // Главное название в админке
    'label' => 'Projects',
    // Массив меток для различных интерфейсных элементов
    'labels' => array(
      'name' => 'Projects',                    // Название во множественном числе
      'singular_name' => 'Project',            // Название в единственном числе
      'add_new' => 'Add New Project',          // Кнопка "Добавить новую"
      'add_new_item' => 'Add New Project',     // Заголовок страницы "Добавить новую"
      'edit_item' => 'Edit Project',           // Заголовок страницы редактирования
      'new_item' => 'New Project',             // Название новой записи
      'view_item' => 'View Project',           // Ссылка "Посмотреть"
      'search_items' => 'Search Projects',     // Строка поиска
      'not_found' => 'No Projects Found',      // Сообщение, если ничего не найдено
      'not_found_in_trash' => 'No Projects Found in Trash' // Сообщение для корзины
    ),
    'public' => true,                          // Делает тип записи публичным (доступен на фронте)
    'has_archive' => true,                     // Включает архивную страницу (например: /projects)
    'show_in_rest' => true,                    // Включает поддержку REST API и Gutenberg редактора
    'menu_icon' => 'dashicons-portfolio',      // Иконка в админ-меню
    'rewrite' => array('slug' => 'projects'),  // Устанавливает ЧПУ (slug) для URL
    'supports' => array(
      'title',           // Заголовок
      'editor',          // Контент (визуальный редактор)
      'thumbnail',       // Миниатюра записи (featured image)
      'excerpt',         // Цитата
      // 'custom-fields',   // Пользовательские поля
      // 'comments',        // Комментарии
      // 'revisions',       // Ревизии
      // 'author'           // Автор
    )
  ));
}

// Хук для вызова нашей функции при инициализации WordPress
add_action('init', 'register_post_types');

