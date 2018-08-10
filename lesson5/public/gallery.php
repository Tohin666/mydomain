<?php
echo '<div class="gallery">';


require_once('../config/config.php');
require_once('../engine/db.php');


$sqlSelectImages = 'SELECT * FROM images';
$images = getAssocResult($sqlSelectImages);


foreach ($images as $image):

    echo '<a href="img/' . $image['name'] . '" target = blank><img src="img/' . $image['name'] . '"></a>';

endforeach;



//$images = scandir('./img');
//for ($i = 2; $i < count($images); $i++) {
//    echo '<a href="img/' . $images[$i] . '" target = blank><img src="img/' . $images[$i] . '"></a>';
//}
//echo '</div>';