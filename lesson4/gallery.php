<?php
echo '<div id="gallery" class="gallery">';
$images = scandir(__DIR__ . '/img/small');
for ($i = 2; $i < count($images); $i++) {
    $bigPictureName = substr_replace($images[$i], '', strrpos($images[$i], '_small'), 6);
    echo '<a href="img/big/' . $bigPictureName . '" target = blank><img src="img/small/' . $images[$i] . '"></a>';
}
echo '</div>';