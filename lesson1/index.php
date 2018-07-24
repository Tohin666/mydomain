<?php
$title = 'lesson1';
$h2_1 = 'Task 3';
$h2_2 = 'Task 5';

$a = 5;
$b = '05';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body>
<div>
    <h1><?= $title ?></h1>

    <h2><?= $h2_1 ?></h2>
    <p><?= "a = $a" ?></p>
    <p><?= "b = '$b'" ?></p>
    <p><?= 'var_dump($a == $b) - ' ?><? var_dump($a == $b) ?><?= ', потому что используется не строгое сравнение, не сравнивается по типам.' ?></p>
    <p><?= 'var_dump((int)\'012345\') - ' ?><? var_dump((int)'012345') ?><?= ', потому что строка преобразовалась в целое число и первый ноль отбросился за ненадобностью.' ?></p>
    <p><?= 'var_dump((float)123.0 === (int)123.0) - ' ?><? var_dump((float)123.0 === (int)123.0) ?><?= ', потому что второе число преобразовалось в целое и при этом используется строгое сравнение.' ?></p>
    <p><?= 'var_dump((int)0 === (int)\'hello, world\') - ' ?><? var_dump((int)0 === (int)'hello, world') ?><?= ', потому что строка не смогла преобразоваться в число и получислось false, то есть 0.' ?></p>

    <h2><?= $h2_2 ?></h2>
    <p><?php
        $a = 1;
        $b = 2;
        echo 'a = ' . $a . ', b = ' . $b;
        $a += $b;
        $b = $a - $b;
        $a -= $b;
        echo '<br>$a += $b<br> $b = $a - $b<br> $a -= $b<br>';
        echo 'a = ' . $a . ', b = ' . $b;
        ?></p>
</div>
<footer>
    <hr>
    <p><?= date('Y') ?></p>
</footer>

</body>
</html>

