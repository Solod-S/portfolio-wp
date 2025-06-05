<?php
// Регистрируем функцию 'enqueue_scripts', которая будет вызываться WordPress-ом, 
// чтобы подключить стили и скрипты на сайте
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// Определяем функцию, которая подключает CSS и JavaScript
function enqueue_scripts()
{
	// Подключаем основной CSS-файл из папки assets внутри темы
	wp_enqueue_style(
		'main-css', // Уникальный идентификатор для стиля
		get_template_directory_uri() . '/assets/main.css', // Путь к файлу
		array(), // Зависимости (если есть другие стили, от которых зависит этот)
		'1.0.0', // Версия файла
		'all' // Тип устройства (all = для всех устройств)
	);

	// Подключаем основной JavaScript-файл из папки assets
	wp_enqueue_script(
		'main-js', // Уникальный идентификатор скрипта
		get_template_directory_uri() . '/assets/main.js', // Путь к файлу
		[], // Зависимости (например, jQuery, если нужен)
		'1.0.0', // Версия скрипта
		true // true = подключить внизу страницы перед закрывающим тегом </body>
	);
}

// Используем фильтр 'the_content', чтобы изменить содержимое постов
// add_filter('the_content', 'add_custom_content', 10, 1);

// Функция, которая заменяет содержимое поста на свой текст
// там где используем  the_content();

function add_custom_content($content)
{
	// Заменяем весь текст поста на нашу кастомную строку
	$content = '<p style="font-size: 64px"> Custom content<p/>';
	return $content;
}
