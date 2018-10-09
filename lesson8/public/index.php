<?php
header("Content-type: text/html; charset=utf-8");
include __DIR__ . '/../config/mainConfig.php';
require_once ENGINE_DIR . "autoload.php";

session_start();

// Убираем из ссылки первый слеш и параметры.
if (!$path = preg_replace(["#/lesson8/public#", "#^/#", "#[?].*#"], "", $_SERVER['REQUEST_URI'])) {
    // По умолчанию будет выводится каталог.
    $path = "product";
};

// Разбиваем путь на части по слешу.
$parts = explode("/", $path);
// Первая часть будет страницей (контроллером)
$page = $parts[0];

// Вторая действием (по умолчанию index)
$action = $parts[1] ?? "index";

// Собираем путь до страницы.
$pageName = PAGES_DIR . $page . "/" . $action . ".php";

if (file_exists($pageName)) {
    // выводим страницу
    include $pageName;
} else {
    // в противном случае выводим шаблон 404
    echo "Такой страницы нет!";
}