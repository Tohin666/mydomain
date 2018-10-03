<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINES_DIR . 'dbEngine.php';
include ENGINES_DIR . 'productsFunctions.php';

$catalog = getCatalog();

include TEMPLATES_DIR . 'catalogTemplate.php';
