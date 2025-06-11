<?php
// Получаем значение поля 'show_hero'. Если false — не выводим секцию
$show = get_field('show_hero');
if (!$show) {
  return; // Прерываем выполнение, если секция отключена
}

// Получаем данные из ACF
$hero_title = get_field('hero_title'); // Заголовок hero-секции
$hero_description = get_field('hero_description'); // Описание
$hero_buttons = get_field('hero_buttons'); // Кнопки Call-To-Action (массив)
$first_cta = $hero_buttons["lets_talk"]; // Первая кнопка (например, "Давайте поговорим")
$second_cta = $hero_buttons["cta_portfolio"]; // Вторая кнопка (например, "Портфолио")
$hero_image = get_field('hero_image'); // Картинка
?>

<!-- Секция hero -->
<section id="home-hero" class="hero mt-2 mb-2">
  <div class="container">
    <div class="row">

      <!-- Левая колонка: текст и кнопки -->
      <div class="col-md-6">
        <!-- Проверка наличия заголовка -->
        <?php if ($hero_title <> ""): ?>
          <h1><?php echo $hero_title; ?></h1>
        <?php endif; ?>

        <!-- Проверка наличия описания -->
        <?php if ($hero_description <> ""): ?>
          <p><?php echo $hero_description; ?></p>
        <?php endif; ?>

        <!-- Блок с кнопками -->
        <div class="d-flex align-items-center mt-4">
          <!-- Первая кнопка -->
          <?php if ($first_cta): ?>
            <a href="<?php echo esc_url($first_cta['url']); ?>" class="btn--primary d-inline-flex align-items-center">
              <!-- SVG иконка кнопки -->
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
                <path d="M3 21v-7a9 9 0 1 1 9 9h-7l-4 4z" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
              <?php echo esc_html($first_cta['title']); ?>
            </a>
          <?php endif; ?>

          <!-- Вторая кнопка -->
          <?php if ($second_cta): ?>
            <a href="<?php echo esc_url($second_cta['url']); ?>" class="btn--secondary ms-3">
              <!-- SVG иконка кнопки -->
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 7h16M4 7l2-3h12l2 3M4 7v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <rect x="8" y="11" width="8" height="6" rx="1" stroke="currentColor" stroke-width="2" />
              </svg>
              <?php echo esc_html($second_cta['title']); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Правая колонка: изображение -->
      <div class="col-md-6 mt-4 mt-md-0 d-flex justify-content-center">
        <?php if ($hero_image): ?>
          <div class="hero-image text-center">
            <!-- Картинка hero, адаптивная -->
            <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>"
              class="img-fluid mx-auto d-block" style="max-width: 70%; height: auto;" />
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>