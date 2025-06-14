<?php
if (!defined('ABSPATH'))
	exit;

// Define constants
if (!defined('_VERSION')) {
	define('_VERSION', '1.0.0');
}

// Include styles and scripts
require get_template_directory() . '/inc/_scripts.php';

// Post types
require get_template_directory() . '/inc/_post-types.php';

// Register menus
require get_template_directory() . '/inc/_menus.php';

// Register acf blocks
require get_template_directory() . '/inc/_acf.php';


// testing

// Добавляем новую колонку в список постов
add_filter('manage_post_posts_columns', 'add_translate_column');
function add_translate_column($columns)
{
	$columns['translate_action'] = 'Переклад 🇺🇸';
	return $columns;
}

// Заполняем колонку кнопкой
add_action('manage_post_posts_custom_column', 'fill_translate_column', 10, 2);
function fill_translate_column($column, $post_id)
{
	if ($column === 'translate_action') {
		echo '<button 
            class="translate-button" 
            data-post-id="' . esc_attr($post_id) . '" 
            style="padding: 4px 10px; cursor: pointer;"
        >Перекласти 🇺🇸</button>';
	}
}

// Подключаем JS
add_action('admin_enqueue_scripts', 'enqueue_translate_script');
function enqueue_translate_script($hook)
{
	if ($hook !== 'edit.php')
		return;

	wp_enqueue_script('translate-script', get_template_directory_uri() . '/js/translate.js', [], false, true);
	wp_localize_script('translate-script', 'translateData', [
		'apiUrl' => '',
		'apiKey' => '',
	]);
}

