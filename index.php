<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php1-2</title>
</head>
<body>
<h1>php1-2</h1>

<?php
$scanDir = scandir('./');
echo '<ul>';
for ($i = 5; $i < count($scanDir); $i++) {
echo '<li><a href="' . $scanDir[$i] . '">' . $scanDir[$i] . '</a></li>';
}
echo '</ul>';
?>

</body>
</html>