<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator</title>
</head>
<body>

<form action="">
    <input type="text" name="firstNumber">
    <input type="text" name="secondNumber">
    <select name="action" id="">
        <option value="addition">Сложение</option>
        <option value="subtraction">Вычитание</option>
        <option value="multiplication">Умножение</option>
        <option value="division">Деление</option>
    </select>
    <input type="submit"><br>
    <input type="submit" name="action" value="addition">
    <input type="submit" name="action" value="subtraction">
    <input type="submit" name="action" value="multiplication">
    <input type="submit" name="action" value="division">
    <?php
    if (isset($result)) {
         echo "<h2>Результат: $result</h2>";
    }
    ?>

</form>

</body>
</html>