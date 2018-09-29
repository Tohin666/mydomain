<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINE_DIR . 'dbEngine.php';
include ENGINE_DIR . 'catalogFunctions.php';

$catalog = getCatalog();

include TEMPLATES_DIR . 'catalogTemplate.php';
