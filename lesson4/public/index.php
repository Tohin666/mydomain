<?php
header('Content-type: text/html; charset=utf-8');

include __DIR__ . '/../config/main.php';
include ENGINE_DIR . 'galleryFunctions.php';
include ENGINE_DIR . 'files.php';
include VENDOR_DIR . 'funcImgResize.php';

// Если поступил запрос методом POST, то обрабатываем его.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // С помощью функции загружаем изображение и создаем его уменьшенную копию.
    uploadFile(PUBLIC_DIR . 'img/big/', 'loadedImage');
    // Делаем редирект, чтобы при нажатии на F5 не происходила повторная отправка файла.
    header('Location: index.php');
    exit; // Завершаем скрипт, чтобы больше ничего не выполнялось после редиректа.
}

// Возвращаем список изображений для галереи.
$gallery = getGallery();
// Создаем галерею из шаблона.
include TEMPLATES_DIR . 'galleryTemplate.php';


