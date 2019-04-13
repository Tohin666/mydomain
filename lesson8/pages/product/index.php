<?php

$catalog = getCatalog();

render('catalogTemplate', ['catalog' => $catalog]);

