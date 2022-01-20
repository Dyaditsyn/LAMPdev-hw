<?php
//! Простые
//? - в переменной $date лежит дата формата '31-12-2020'. Преобразуйте эту дату в формат '2020.12.31'.
$data = '31-12-2020';
$formated = implode('.', array_reverse(explode('-', $data)));
echo "Original date: $data. " . "Formated date $formated" . "<hr>";

//? - дана строка 'london is the capital of great britain'. Сделайте из нее строку 'London Is The Capital Of Great Britain'
$str = 'london is the capital of great britain';
echo "Original string: $str" . "<br>";
echo "Modified string: " . ucwords($str) . "<hr>";

//? - дана переменная $password, в которой хранится пароль пользователя. Если количество символов пароля больше 7 и меньше 12, 
//? то выведите пользователю сообщение о том, что пароль подходит, иначе: сообщение о том, что нужно придумать другой пароль.
$password = "12345678";
$password2 = "abc";

echo "try $password:" . "<br>";
if (strlen($password) >= 7 && strlen($password) <= 12) {
    echo "Пароль подходит";
} else {
    echo "Пароль не подходит. Придумайте, пожалуйста, новый пароль длиной от 7 до 12 символов";
}
echo "<br>";

echo "try $password2:" . "<br>";
if (strlen($password2) >= 7 && strlen($password2) <= 12) {
    echo "Пароль подходит";
} else {
    echo "Пароль не подходит. Придумайте, пожалуйста, новый пароль длиной от 7 до 12 символов";
}
echo "<hr>";

//? - дана строка с буквами и цифрами, например, '1a2b3c4b5d6e7f8g9h0'. Удалите из нее все цифры. В нашем случае должна получится строка 'abcbdefgh'
$myStr = "1a2b3c4b5d6e7f8g9h0";
$string_after = preg_replace("/[\d]/", "", $myStr);
echo "Original string: $myStr" . "<br>";
echo "Modified string - numbers excluded: $string_after" . "<hr>";

//! Сложное
//? -  $text = "Главным фактором языка РНР является практичность. РНР должен предоставить программисту средства для быстрого и эффективного решения поставленных задач. Практический характер РНР обусловлен пятью важными характеристиками: традиционностью, простотой, эффективностью, безопасностью, гибкостью. Существует еще одна «характеристика», которая делает РНР особенно привлекательным: он распространяется бесплатно! Причем, с открытыми исходными кодами ( Open Source ). Язык РНР будет казаться знакомым программистам, работающим в разных областях. Многие конструкции языка позаимствованы из Си, Perl. Код РНР очень похож на тот, который встречается в типичных программах на С или Pascal. Это заметно снижает начальные усилия при изучении РНР. PHP — язык, сочетающий достоинства Perl и Си и специально нацеленный на работу в Интернете, язык с универсальным (правда, за некоторыми оговорками) и ясным синтаксисом. И хотя PHP является довольно молодым языком, он обрел такую популярность среди web-программистов, что на данный момент является чуть ли не самым популярным языком для создания web-приложений (скриптов).";
//? - разбить текст на строки максимум по 80 символов. Строки нужно делить по словам, дополняя пробелами между словами до 80 символов
//? - т.е как бы реализовать выравнивание текста по ширине как ворд делает
//? - т.е если у нас например есть строка вида
//? "Главным фактором языка РНР является практичность. РНР должен предоставить"
//? это 73 символа
//? значит между словами мы должны равномерно распределить 7 пробелов (80 -73)
//? и тогда выровнянная строка будет вида
//?"Главным фактором языка РНР является практичность. РНР должен предоставить"
//? после последнего слова пробелов добавлять не нужно

$text = "Главным фактором языка РНР является практичность. РНР должен предоставить программисту средства для быстрого и эффективного решения поставленных задач. Практический характер РНР обусловлен пятью важными характеристиками: традиционностью, простотой, эффективностью, безопасностью, гибкостью. Существует еще одна «характеристика», которая делает РНР особенно привлекательным: он распространяется бесплатно! Причем, с открытыми исходными кодами ( Open Source ). Язык РНР будет казаться знакомым программистам, работающим в разных областях. Многие конструкции языка позаимствованы из Си, Perl. Код РНР очень похож на тот, который встречается в типичных программах на С или Pascal. Это заметно снижает начальные усилия при изучении РНР. PHP — язык, сочетающий достоинства Perl и Си и специально нацеленный на работу в Интернете, язык с универсальным (правда, за некоторыми оговорками) и ясным синтаксисом. И хотя PHP является довольно молодым языком, он обрел такую популярность среди web-программистов, что на данный момент является чуть ли не самым популярным языком для создания web-приложений (скриптов).";

$textArr = explode(" ", $text);

$lineLength = 80;
$formated = '';
$tempStr = '';
$currentPos = 0;
$searchFrom = 0;

for ($i = 0; $i < count($textArr); $i++) {
    if (mb_strlen($tempStr . " " . $textArr[$i]) <= $lineLength) {
        $tempStr .= $textArr[$i] . " ";
    } else {
        rtrim($tempStr);

        $tempStrLen = mb_strlen($tempStr);
        $spacesSpare = $lineLength - $tempStrLen;
        $tempArr = explode(" ", $tempStr);
        array_pop($tempArr);
        $words = count($tempArr);

        echo '$tempStrLen: ' . $tempStrLen . '$spacesSpare: ' . $spacesSpare . '$words: ' . $words . ' $tempStr: ' .  $tempStr . "<br>";

        if (mb_strlen($tempStr) < $lineLength) {
            $searchFrom = 0;
            for ($j = 0; $j < $spacesSpare && $searchFrom < mb_strlen($tempStr) - 1; $j++) {
                $currentPos = mb_strpos($tempStr, ' ', $searchFrom);
                $tempStr = mb_substr($tempStr, 0, $currentPos) . ' ' . mb_substr($tempStr, $currentPos);

                if ($currentPos + 2 < mb_strlen($tempStr) - 1) {
                    $searchFrom = $currentPos + 2;
                } elseif ($j < $spacesSpare) {
                    rtrim($tempStr);
                    $j--;
                    $searchFrom = 0;
                }
            }
        }

        $tempStr .= "<br>";
        $formated .= $tempStr;
        $tempStr = '';
        $i--;
    }
}

$tempStrLen = mb_strlen($tempStr); // actual line length - 74
$spacesSpare = $lineLength - $tempStrLen; // how many spare spaces up to 80 symbols - 6
$tempArr = explode(" ", $tempStr); // array from trhe line
array_pop($tempArr); // cleaning last empty element
$words = count($tempArr); // number of words in the line
if (mb_strlen($tempStr) < $lineLength) {
    $searchFrom = 0;
    for ($j = 0; $j < $spacesSpare && $searchFrom < mb_strlen($tempStr) - 1; $j++) {
        $currentPos = mb_strpos($tempStr, ' ', $searchFrom);
        $tempStr = mb_substr($tempStr, 0, $currentPos) . ' ' . mb_substr($tempStr, $currentPos);
        rtrim($tempStr);
        if ($currentPos + 2 < mb_strlen($tempStr) - 1) {
            $searchFrom = $currentPos + 2;
        } elseif ($j < $spacesSpare) {
            rtrim($tempStr);
            $j--;
            $searchFrom = 0;
        }
    }
}

$tempStr .= "<br/>";
$formated .= $tempStr;

echo "<pre>$formated</pre>";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PHP Strings</title>
</head>

<body>
    <div class="main_page">
        <!-- <h1>some title</h1> -->
    </div>
</body>

</html>