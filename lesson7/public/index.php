<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINE_DIR . 'render.php';

render('indexTemplate');
//include TEMPLATES_DIR . 'indexTemplate.php';
