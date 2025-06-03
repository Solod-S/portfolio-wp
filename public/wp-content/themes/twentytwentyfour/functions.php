<?php
/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register block styles.
 */

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) :
	/**
	 * Register custom block styles
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'twentytwentyfour' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfour' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'twentytwentyfour' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'twentytwentyfour' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_styles' );

/**
 * Enqueue block stylesheets.
 */

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_stylesheets' );

/**
 * Register pattern categories.
 */

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) :
	/**
	 * Register pattern categories
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfour_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'twentytwentyfour' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfour' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_pattern_categories' );


// !!!

// functions.php вашей темы или кастомного плагина


// Добавить новый столбец
add_filter('manage_post_posts_columns', 'add_custom_translation_column');
function add_custom_translation_column($columns) {
    $columns['translation_action'] = 'Переклад 🇺🇸';
    return $columns;
}

// Контент внутри столбца
add_action('manage_post_posts_custom_column', 'render_translation_button', 10, 2);
function render_translation_button($column_name, $post_id) {
	if ($column_name === 'translation_action') {
			echo '<button class="translate-button button" data-post-id="' . $post_id . '" style="background-color: #007BFF; color: #fff; border-radius: 12px; padding: 6px 12px; border: none; cursor: pointer; font-weight: 700;">Перекласти</button>';
	}
}

add_action('admin_enqueue_scripts', 'enqueue_custom_admin_script');
function enqueue_custom_admin_script($hook) {
    if ($hook !== 'edit.php') return;

    wp_enqueue_script('custom-admin-script', get_template_directory_uri() . '/js/admin-translation.js', ['jquery'], false, true);
    wp_localize_script('custom-admin-script', 'translationData', [
        'apiUrl' => 'https://dev-hup.pp.ua/api/maletranslation',
        'apiKey' => 'YOUR_API_KEY_HERE'
    ]);
}


// ---------------  Добавить колонку для выбора категорий --------------- 
add_filter('manage_post_posts_columns', 'add_category_selector_column');
function add_category_selector_column($columns) {
    $columns['category_selector'] = 'Категорії 🇺🇸';
    return $columns;
}

// Отрисовка чекбоксов
add_action('manage_post_posts_custom_column', 'render_category_selector_column', 10, 2);

function render_category_selector_column($column_name, $post_id) {
	if ($column_name === 'category_selector') {
			echo '
			<div class="category-wrapper" data-post-id="' . $post_id . '">
					<label><input type="checkbox" class="category-checkbox" data-post-id="' . $post_id . '" value="1"> Новини</label><br/>
					<label><input type="checkbox" class="category-checkbox" data-post-id="' . $post_id . '" value="4"> Думки</label>
			</div>
			';
	}
}

add_action('admin_head', function () {
	echo '<style>
			.category-wrapper.highlight-border {
					border: 2px solid red;
					padding: 6px;
					border-radius: 4px;
					background: #ffe6e6;
					transition: border 0.3s ease;
			}
	</style>';
});



// --------------- Добавить колонку Тип ------------------
add_filter('manage_post_posts_columns', 'add_post_type_column');
function add_post_type_column($columns) {
    $columns['post_type_flags'] = 'Тип 🇺🇸';
    return $columns;
}

// Отрисовка чекбоксов "Тип"
add_action('manage_post_posts_custom_column', 'render_post_type_column', 10, 2);
function render_post_type_column($column_name, $post_id) {
    if ($column_name === 'post_type_flags') {
        echo '
        <div class="type-wrapper" data-post-id="' . $post_id . '">
            <label><input type="checkbox" class="type-checkbox" data-post-id="' . $post_id . '" value="post_bold"> Виділити</label><br/>
            <label><input type="checkbox" class="type-checkbox" data-post-id="' . $post_id . '" value="post_front_head"> Хедлайн</label>
        </div>';
    }
}
