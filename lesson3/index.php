<?php
echo '<h1>Lesson3</h1>';

//===========================================

echo '<h2>Task1</h2>';

$number = 0;
while ($number <= 100) {
    if ($number % 3 == 0) {
        echo $number . ' ';
    }
    $number++;
}

//===========================================

echo '<h2>Task2</h2>';

$number = 0;
echo $number . ' - это ноль.<br>';
do {
    $number++;
    if ($number % 2 == 0) {
        echo $number . ' - четное число.<br>';
    } else {
        echo $number . ' - нечетное число.<br>';
    }
} while ($number < 10);

//===========================================

echo '<h2>Task3</h2>';

$arr = [
    'Московская область' => [
        'Москва', 'Зеленоград', 'Клин', 'Химки'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'
    ],
    'Рязанская область' => [
        'Рязань', 'Шацк', 'Касимов', 'Михайлов'
    ],
    'Республика Мордовия' => [
        'Саранск', 'Рузаевка', 'Краснослободск', 'Темников'
    ]
];
foreach ($arr as $region => $cities) {
    echo $region . ':<br>';
    foreach ($cities as $city) {

        if ($city == end($cities)) {
            echo $city . '.<br>';
        } else {
            echo $city . ', ';
        }
    }
}

//===========================================

echo '<h2>Task4</h2>';

function transliteration($string)
{
    $alphabet = [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'j',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sch',
        'ъ' => '\'',
        'ы' => 'y',
        'ь' => '\'',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya'
    ];
    foreach ($alphabet as $ru => $en) {
        $string = str_replace($ru, $en, $string);
    }
    return $string;
}

echo transliteration('эта функция возвращает строку или массив с замененными значениями');

//===========================================

echo '<h2>Task5</h2>';

function replace($string)
{
    $string = str_replace(' ', '_', $string);
    return $string;
}

echo replace('эта функция возвращает строку или массив с замененными значениями');

//===========================================

echo '<h2>Task6</h2>';

function menu($menuList)
{
    $menuLi = '';
    foreach ($menuList as $ul => $li) {
        if (gettype($li) == 'array') {
            $subMenu = '';
            foreach ($li as $subLi) {
                $subMenu = $subMenu . '<li>' . $subLi . '</li>';
            }
            $menuLi = $menuLi . '<li>' . $ul . '</li>' . '<ul>' . $subMenu . '</ul>';
        } else {
            $menuLi = $menuLi . '<li>' . $li . '</li>';
        }
    }
    $menu = '<ul>' . $menuLi . '</ul>';
    return $menu;
}

$menuList = [
    'Home',
    'Men' => [
        'Tees/Tank tops', 'Shirts/Polos', 'Sweaters', 'Sweatshirts/Hoodies', 'Blazers', 'Jackets/vests'
    ],
    'Women' => [
        'Dresses', 'Tops', 'Sweaters/Knits', 'Jackets/Coats', 'Denim', 'Leggings/Pants', 'Skirts/Shorts', 'Nightwear'
    ],
    'Kids' => [
        'Tees/Tank tops', 'Shirts/Polos', 'Sweatshirts/Hoodies',
    ],
    'Accessories' => [
        'Bags/Purses', 'Shoes', 'Beauty', 'Swimwear/Underwear'
    ],
    'Featured',
    'Hot Deals'
];
echo menu($menuList);

//===========================================

echo '<h2>Task7</h2>';

for ($i = 0; $i <= 9; print_r($i++)) {
}

//===========================================

echo '<h2>Task8</h2>';

// Здесь пришлось везде вставить К латинскую, никак не хотело работать с русской К.
$arr = [
    'Московская область' => [
        'Москва', 'Зеленоград', 'Клин', 'Химки'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'
    ],
    'Рязанская область' => [
        'Рязань', 'Шацк', 'Касимов', 'Михайлов'
    ],
    'Республика Мордовия' => [
        'Саранск', 'Рузаевка', 'Краснослободск', 'Темников'
    ]
];
foreach ($arr as $region => $cities) {
    echo $region . ':<br>';
    foreach ($cities as $city) {
        if (mb_substr($city, 0, 1) == 'К') {
            echo $city . '<br>';
        }
    }
}

//===========================================

echo '<h2>Task9</h2>';

function transliterationReplace($string)
{
    $alphabet = [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'j',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sch',
        'ъ' => '\'',
        'ы' => 'y',
        'ь' => '\'',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya'
    ];
    foreach ($alphabet as $ru => $en) {
        $string = str_replace($ru, $en, $string);
    }
    $string = str_replace(' ', '_', $string);
    return $string;
}

echo transliterationReplace('эта функция возвращает строку или массив с замененными значениями');