<?php
function render($templateName, $params = [])
{
    extract($params);
    include TEMPLATES_DIR . "{$templateName}.php";
}