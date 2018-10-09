<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGIN_DIR . 'dbEngine.php';
include ENGIN_DIR . 'productsFunctions.php';
include ENGIN_DIR . 'render.php';

$catalog = getCatalog();

render('catalogTemplate', ['catalog' => $catalog]);