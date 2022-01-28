<?php
// $a = 1;
// $b = 2;
// $rusEng = [
//     "colors" => [
//         "white" => "белый",
//         "black" => "черный",
//         "green" => "зеленый"
//     ],
//     "fruits" => [
//         "apple" => "яблоко",
//         "banana" => "банан",
//         "peach" => "персик"
//     ],
//     "task" => [
//         "1" => ($a + $b)
//     ]
// ];

// $colors = [
//     "white" => "белый",
//     "black" => "черный",
//     "green" => "зеленый"
// ];

// var_dump(current($colors));
// var_dump(next($colors));
// var_dump(current($colors));
// var_dump(next($colors));
// var_dump(prev($colors));
// var_dump(end($colors));
// var_dump(next($colors));
// reset($colors);
// var_dump(current($colors));

// $users = [];
//   echo "Hello world!";
//   echo "111";

// echo "<pre>";
// print_r($rusEng);
// echo "</pre>";

// $a = 1;
// $b = rand(1, 100); // random number in range [0...3]
// echo $b .  "<br>";
// // regular syntax
// if ($b % 2 !== 0) {
//     echo "Число не четное!";
// } else {
//     echo "Число четное!";
// }

// use this syntax in case into html
// if ($b == 0) :
//     echo "На ноль делить нельзя!";
// else :
//     echo $c = $a / $b;
// endif;

// $b = rand(1, 100);
// $a = rand(-5, 10);
// echo $a;
// if ($a > 0) {
//     echo "Число положительное!";
// } elseif ($a  < 0) {
//     echo "Число отрицательное!";
// } else {
//     echo "Число - ноль";
// }

// $users = [
//     "5" => ["name" => "Test", "email" => "test@test.com", "lang" => "ru"],
//     "3" => ["name" => "Anton", "email" => "anton@gmail.com",  "lang" => "ua"],
//     "1" => ["name" => "Stewart", "email" => "stewart@gmail.com",  "lang" => "en"],
//     "23" => ["name" => "Bernardo", "email" => "bernardo@gmail.com",  "lang" => "fr"],
//     "11" => ["name" => "Maximillian", "email" => "maximilian@gmail.com",  "lang" => "de"],
//     "17" => ["name" => "Tyler", "email" => "tyler@gmail.com",  "lang" => "en"],
//     "8" => ["name" => "Sedrick", "email" => "sedrick@gmail.com",  "lang" => "ru"],
// ];

// $isElementExist = current($users);
// while ($isElementExist) {
//     $user = current($users);
//     echo $user["name"] . "<br>";
//     $isElementExist = next($users);
// }

// $arr = [1, 4, 6, 9, 10, 3];
// $sum = 0;
// $mult = 1;
// $i = 0;

// while ($i < count($arr)) {
//     var_dump($i);
//     if ($arr[$i] % 2 == 0) {
//         $sum  += $arr[$i];
//     } else {
//         $mult *= $arr[$i];
//     }
//     $i++;
// }
// echo  "<br>" . $sum . "<br>";
// echo $mult . "<br>";

// for ($j = 2; $j <= 10; $j++) {
//     for ($i = 1; $i <= 10; $i++) {
//         echo $j . " x " . $i . " = " . $j * $i . "<br>";
//     }
//     echo "<hr>";
// }

// foreach ($users as $user) {
//     echo "<pre>";
//     print_r($user);
//     echo "</pre>";
// }

// $arr = [1, 2, 3, 8, 9];
// $sum = 0;
// $mult = 1;
// foreach ($arr as $k => $item) { //  доступ как к значениям так и к ключам
//     if ($item % 2 == 0) {
//         $sum  += $item;
//     } else {
//         $mult *= $item;
//     }
// }
// echo  "<br>" . $sum . "<br>";
// echo $mult . "<br>";

// foreach ($users as $id => $user) {
//     echo $id . " ";
//     foreach ($user as $key => $val) {
//         echo $key . ":" . $val . " ";
//     }
//     echo "<br>";
// }

// $arr = ['green' => 'зеленый', 'red' => 'красный', 'blue' => 'голубой'];
// foreach ($arr as $k => $v) {
//     echo $k . " - " . $v . "<br>";
// }

// $arr = [
//     'html' => ['div', 'p', 'h'],
//     'css' => ['margin', 'padding', 'color'],
//     "php" => ['foreach', 'echo', 'sum'],
//     "js" => ['console', 'json']
// ];
// $max = 0;
// echo "<table>";
// echo "<tr>";
// foreach ($arr as $k => $v) {
//     echo "<th>" . $k .  "</th>";
//     if (count($v) > $max) {
//         $max = count($v);
//     }
// }

// $keys = array_keys($arr);
// for ($i = 0; $i < $max; $i++) {
//     echo "</tr>";
//     for ($j = 0; $j < count($keys); $j++) {
//         echo "<td>" . ($arr[$keys[$j]][$i] ?? '') . "</td>";
//     }
//     echo "</tr>";
// }
// echo "</table>";

// $num = [1, 2, 5, -3, 0, 9];
// $mult = 1;
// foreach ($num as $v) {
//     $mult *= $v;
//     if ($v == 0) {
//         break;
//     }
//     echo $v . ", ";
// }
// echo "result: " . $mult;

// $digit = rand(0, 100);
// $num1 = [1, 0, 5, -3, 0, 9];
// $num2 = [1, 2, 0, -3, 0, 9];
// $sum = 0;
// foreach ($num1 as $v) {
//     $mult = 1;
//     foreach ($num2 as $v2) {
//         if ($v2 == 0) {
//             $mult = 0;
//             break;
//         }
//         echo $v2 . ", ";
//         $mult *= $v2;
//     }
//     echo "<br>";
//     $sum += $v + $mult;
// }
// echo "result: " . $sum;

// for ($i = 0; $i <= 20; $i++) {
//     if ($i % 2 !== 0) {
//         continue;
//     }
//     echo $i . " ";
// }

// $num2 = [1, 2, 0, -3, 0, 9];
// $message = "Нет";
// foreach ($num2 as $item) {
//     if ($item < 0) {
//         $message = "Да";
//         break;
//     }
// }
// echo $message;

// ! Strings in PHP
// $message1 = 'it\'s me'; // экранирование
// echo $message1 . "<br>";

// $message2 = 'it\\s me'; // экранирование
// echo $message2 . "<br>";

// $message3 = "it's me"; // не нужно экранирование
// echo $message3 . "<br>";

// $word = "world";
// echo "Hello " . $word . "<br>";

// echo "Hello $word" . "<br>"; // с двойными кавычками работает распознавание переменной
// echo 'Hello $word' . "<br>"; // с одинарными работать не будет

// *функции для работы со строками
// ? echo();
// ? substr();
// phpinfo();
// die();
// $str = "Hello world!";
// echo substr($str, 6, 6); // только для латинских символов. длина русских не 1 символ и будет работать не корректно

// mb_substr работает с другими языками как substr для английских букв

// ? strpos(); 
// ? exlode();
// var_dump(explode(" ", $str)); // разбить строку по символу на масств слов

// ? str_replace();
// echo str_replace("!", "?", $str);
// echo "<br>";
// echo str_replace(["Hello", "world"], ["World", "hello"], $str);
// echo "<br>";

// ? chr() vs ord() - ASCII

// ? sha1, md5, crypt - salt needed. possible add salt to sha1 and md5
// $pass = "11111";
// $pass2 = "22222";
// echo crypt($pass, "un94857n348975");
// echo "<br>";
// echo sha1($pass2);
// echo "<br>";

// $cryptedPass = "1a9b9508b6003b68ddfe03a9c8cbc4bd4388339b";
// $plainPass = '';
// for ($i = 0; $i <= 10000000; $i++) {
//     if (sha1($i) === $cryptedPass || md5($i) === $cryptedPass) {
//         $plainPass = $i;
//     }
// }
// echo $plainPass;
// echo "<br>";
// ? htmlentities() htmlspecialchars()
// ? implode()  - join()

// $words = ["Hello", "world"];
// echo implode(" ", $words)

// ? lcfirst()  ucfirst()
// ? strtolower(), strtoupper() ucwords() - последняя все слова с болльшой буквы

// ? money_format() number_format()
// ? parse_str() 
// ? print() printf()
// ? trim() удаляет символы в начале и в конце строки (можно любой другой символ)
// ltrim() rtrim()
// ? str_repeat()
// ? strcmp() - сравнение строк (strcasecmp())
// ? strip_tags() удалить теги из строки
// ? strlen() длина строки
// ? strstr() первое вхождение подстроки - возаращает подстроку начиная с нужного символа

// ! работа с файлами PHP

// define("ROOT_PATH", dirname(__FILE__)); // константа адрес корня
// var_dump(dirname(__FILE__));
// $f = fopen(ROOT_PATH . DIRECTORY_SEPARATOR . "test.txt", "r+");
// r+ запись в начало файла
// a+ запись в конец файла

// if (!$f) {
//     echo "Ошибка открытия файла";
//     die();
// }
// //var_dump($f);
// fputs($f, "test"); // запись в файл 
// fseek($f, 0); // переместить указатель на начало файла

// while (!feof($f)) { // чтение файла построчно
//     echo fgets($f) . "<br>";
// }

// file_exist() true/false проверяет или файл есть на диске
// file_get_contents - считывает все содержимое файла

// $str = file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "test.txt", "r+");
// file_put_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "test2.txt", "REcontent test2", FILE_APPEND);
// echo $str;

// fclose($f); // закрытие файла в конце работы

// ! работа с файлами PHP 2
// echo "<br><br> FILES PART-2 <br><br>";

// csv format, transform to arrays
// json format
// json_encode()
// json_decode() второй параметр true - выдаст в виде массива

// $users = [
//     "5" => ["name" => "Test", "email" => "test@test.com", "lang" => "ru"],
//     "3" => ["name" => "Anton", "email" => "anton@gmail.com",  "lang" => "ua"],
//     "1" => ["name" => "Stewart", "email" => "stewart@gmail.com",  "lang" => "en"],
//     "23" => ["name" => "Bernardo", "email" => "bernardo@gmail.com",  "lang" => "fr"],
//     "11" => ["name" => "Maximillian", "email" => "maximilian@gmail.com",  "lang" => "de"],
//     "17" => ["name" => "Tyler", "email" => "tyler@gmail.com",  "lang" => "en"],
//     "8" => ["name" => "Sedrick", "email" => "sedrick@gmail.com",  "lang" => "ru"],
// ];

// //var_dump(json_encode($users));

// $users = json_encode($users);
// var_dump(json_decode($users, true));

//? Functions

declare(strict_types=1);
require_once("config.php");


$a = "Hello";
$b = "world!";

function message(string $a, string $b)
{
    return  $a . " " . $b;
}

echo message($a, $b);
// анонимные функции замыкания
// use

function multTable(int $number): array
{
    $result = [];
    for ($i = 0; $i <= 10; $i++) {
        $result[$number . "x" . $i] = $number * $i;
    }
    return $result;
}

echo "<pre>";
print_r(multTable(2));
echo "</pre>";

echo "<hr>";

function sqr(float $number): float
{
    return $number * $number;
}
echo sqr(2.5);

echo "<hr>";

function calc(float $number1, float $number2, float $number3): float
{
    if ($number3 == 0) {
        return 0;
    }
    return ($number1 - $number2) / $number3;
}
echo calc(4, 3, 0);

echo "<hr>";

function calcDay(int $number): string
{
    if (!in_array($number, range(1, 7))) {
        return "Неправильный день";
    }
    switch ($number) {
        case 1:
            $day = "Пн";
            break;
        case 2:
            $day = "Вт";
            break;
        case 3:
            $day = "Ср";
            break;
        case 4:
            $day = "Чт";
            break;
        case 5:
            $day = "Пт";
            break;
        case 6:
            $day =  "Сб";
            break;
        case 7:
            $day = "Вс";
            break;
    }
    return $day;
}

echo calcDay(1);
echo "<br>";
echo calcDay(8);
echo "<hr>";

function checkNotPositive(int $number): bool
{
    return ($number < 0) ? true : false;
}
var_dump(checkNotPositive(2));
var_dump(checkNotPositive(-2));
echo "<hr>";

function factorial($n)
{
    var_dump($n);
    if ($n <= 1) return 1;
    return $n * factorial($n - 1); // здесь происходит повторный вызов функции
}

echo factorial(3);
echo "<hr>";

function getDivisors(int $n): array
{
    $divisors = [];
    for ($i = 1; $i <= $n; $i++) {
        if ($n % $i == 0) {
            $divisors[] = $i;
        }
    }
    return $divisors;
}

echo "<pre>";
print_r(getDivisors(21));
echo "</pre>";
echo "<hr>";

function getCommonDivisors(int $n1, int $n2): array
{
    $div1 = getDivisors($n1);
    $div2 = getDivisors($n2);
    return array_intersect($div1, $div2);
}

echo "<pre>";
print_r(getCommonDivisors(10, 15));
echo "</pre>";
echo "<hr>";

//? Sessions and SuperGlobal
// $_SERVER
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
// echo "<hr>";

//$_GET
echo "<pre>";
print_r($_GET);
echo "</pre>";
echo "<hr>";

//$_POST
//$_REQUEST
//$_ENV
//geenv() putenv()

//$_SESSION

//$_SESSION['message'] = "Hello";
// echo $_SESSION['message'];

$_SESSION['user'] = "Sergey";
if (!empty($_SESSION['user'])) {
    echo "Hello " . $_SESSION['user'];
}

// unset($_SESSION['user']);
// session_destroy(); как логаут на сайте - удалить всю сессию

//? Сохранение данных пользователей с помощью двух механизмов
// на сервере - механизм сессий, в браузере - механизм куков


?>


<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Apache2 Ubuntu Default Page: It works</title>
    <style type="text/css" media="screen">
    </style>
</head>

<body>
    <div class="main_page">
        <h1>My test site <?php echo "on php"; ?> </h1>
    </div>
</body>

</html> -->