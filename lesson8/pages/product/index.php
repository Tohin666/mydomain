<?php
//header('Content-type: text/html, charset=utf-8');
//
//include __DIR__ . '/../config/mainConfig.php';
//include ENGINE_DIR . 'autoload.php';

$catalog = getCatalog();

render('catalogTemplate', ['catalog' => $catalog]);