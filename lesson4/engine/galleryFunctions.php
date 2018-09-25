<?php
function getGallery() {
    return array_filter(
        scandir(PUBLIC_DIR . 'img/small'),
        function ($item) {
            return !is_dir(PUBLIC_DIR . 'img/small/' . $item);
        }
    );
}