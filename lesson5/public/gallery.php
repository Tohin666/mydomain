<?php
header('Content-type: text/html; charset=utf-8');

include __DIR__ . '/../config/main.php';
include ENGI_DIR . 'galleryFunctions.php';
include ENGI_DIR . 'files.php';
include ENGI_DIR . 'dbEngine.php';
include VENDOR_DIR . 'funcImgResize.php';

// Если поступил запрос методом POST, то обрабатываем его.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // С помощью функции загружаем изображение и создаем его уменьшенную копию.
    uploadFile(PUBL_DIR . 'img/big/', 'loadedImage');
    // Делаем редирект, чтобы при нажатии на F5 не происходила повторная отправка файла.
    header('Location: gallery.php');
    exit; // Завершаем скрипт, чтобы больше ничего не выполнялось после редиректа.
}

// Возвращаем список изображений для галереи.
$gallery = getGallery();

//// Сортируем список изображений по количеству просмотров.
//uasort($gallery, function ($a, $b) {
//    $a = $a['view_count'];
//    $b = $b['view_count'];
//    if ($a == $b) {
//        return 0;
//    }
//    return ($a < $b) ? 1 : -1;
//});

// Создаем галерею из шаблона.
include TEMPLAT_DIR . 'galleryTemplate.php';


