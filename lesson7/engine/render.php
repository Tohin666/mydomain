<?php
function render($templateName, $params = [])
{
    extract($params);
    include TEMPLATE_DIR . "{$templateName}.php";
}