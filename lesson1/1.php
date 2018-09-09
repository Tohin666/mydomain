<?php
$name = 'Антон';
$age = 34;
$date = date('d-m-y h:m');

$string = '';
$age1 = $age + 1;
$age2 = $age1 + 1;

$string .= "Меня зовут {$name}.";
$string .= " Через год мне будет {$age1} лет, а еще через год {$age2} лет.";
$string .= " На моих часах сейчас: $date";
echo $string;

$string = str_replace(' ', '_', $string);
echo "<br>$string";

$stringPart = strstr($string, 'Н');
echo "<br>$stringPart";
