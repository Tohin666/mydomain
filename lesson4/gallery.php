<?php
echo '<div class="gallery">';
$images = scandir('./img');
for ($i = 2; $i < count($images); $i++) {
    echo '<a href="img/' . $images[$i] . '" target = blank><img src="img/' . $images[$i] . '"></a>';
}
echo '</div>';