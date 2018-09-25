<?php
function displayDirTree($topDir = './', $dirTree = '')
{
    $dirsAndFiles = array_filter(scandir($topDir), function ($item) {
        return $item != '.' && $item != '..';
    });
    $dirs = array_filter($dirsAndFiles, function ($item) {
        return is_dir($item);
    });

    foreach ($dirs as $dir) {
//        var_dump($dir);
//        var_dump(displayDirTree($dir));
        if ($dir != (displayDirTree($dir))) {
            return displayDirTree($dir, $dirTree);
        }
    }

    $files = array_filter($dirsAndFiles, function ($item) {
        return !is_dir($item);
    });


//    $dirTree = '';
    if ($dirs != [] || $files != []) {
//        var_dump($dirs);
//        var_dump($files);
        $dirTree = '<ul>';


        foreach ($dirs as $item) {
//        $dirTree .= '<li><a href="' . $item . '"><b>[' . $item . ']</b></a></li>';
            $dirTree .= '<li><b>[' . $item . ']</b></li>';
        }
        foreach ($files as $item) {
            $dirTree .= '<li><a href="' . $item . '" target = _blank>' . $item . '</a></li>';
        }

        $dirTree .= '</ul>';
    }



    return $dirTree;
}