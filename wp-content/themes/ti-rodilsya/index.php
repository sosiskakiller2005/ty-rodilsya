<?php get_header() ?>

<main>
    <?php
    // Определяем текущую страницу
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    // Путь к файлу страницы
    $file = __DIR__ . "/pages/{$page}.php";

    // Проверяем, существует ли файл, и подключаем его
    if (file_exists($file)) {
        include $file;
    } else {
        echo "<h1>Страница не найдена</h1><p>Извините, такой страницы не существует.</p>";
    }
    ?>
  </main>
    </div>

    <?php get_footer() ?>