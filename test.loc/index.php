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

$users = [
    "5" => ["name" => "Test", "email" => "test@test.com", "lang" => "ru"],
    "3" => ["name" => "Anton", "email" => "anton@gmail.com",  "lang" => "ua"],
    "1" => ["name" => "Stewart", "email" => "stewart@gmail.com",  "lang" => "en"],
    "23" => ["name" => "Bernardo", "email" => "bernardo@gmail.com",  "lang" => "fr"],
    "11" => ["name" => "Maximillian", "email" => "maximilian@gmail.com",  "lang" => "de"],
    "17" => ["name" => "Tyler", "email" => "tyler@gmail.com",  "lang" => "en"],
    "8" => ["name" => "Sedrick", "email" => "sedrick@gmail.com",  "lang" => "ru"],
];

$isElementExist = current($users);
while ($isElementExist) {
    $user = current($users);
    echo $user["name"] . "<br>";
    $isElementExist = next($users);
}

$arr = [1, 4, 6, 9, 10, 3];
$sum = 0;
$mult = 1;
$i = 0;

while ($i < count($arr)) {
    var_dump($i);
    if ($arr[$i] % 2 == 0) {
        $sum  += $arr[$i];
    } else {
        $mult *= $arr[$i];
    }
    $i++;
}
echo  "<br>" . $sum . "<br>";
echo $mult . "<br>";

// for ($j = 2; $j <= 10; $j++) {
//     for ($i = 1; $i <= 10; $i++) {
//         echo $j . " x " . $i . " = " . $j * $i . "<br>";
//     }
//     echo "<hr>";
// }

foreach ($users as $user) {
    echo "<pre>";
    print_r($user);
    echo "</pre>";
}

$arr = [1, 2, 3, 8, 9];
$sum = 0;
$mult = 1;
foreach ($arr as $k => $item) { //  доступ как к значениям так и к ключам
    if ($item % 2 == 0) {
        $sum  += $item;
    } else {
        $mult *= $item;
    }
}
echo  "<br>" . $sum . "<br>";
echo $mult . "<br>";

foreach ($users as $id => $user) {
    echo $id . " ";
    foreach ($user as $key => $val) {
        echo $key . ":" . $val . " ";
    }
    echo "<br>";
}

$arr = ['green' => 'зеленый', 'red' => 'красный', 'blue' => 'голубой'];
foreach ($arr as $k => $v) {
    echo $k . " - " . $v . "<br>";
}

$arr = ['html' => ['div', 'p', 'h'], 'css' => ['margin', 'padding', 'color'], "php" => ['foreach', 'echo', 'sum']];
echo "<table>";
echo "<tr>";
foreach ($arr as $k => $v) {
    echo "<th>" . $k .  "</th>";
}
echo "</tr>";

$keys = array_keys($arr);
for ($i = 0; $i < count($arr); $i++) {
    echo "</tr>";
    for ($j = 0; $j < count($arr[$keys[$i]]); $j++) {
        echo "<td>" . $arr[$keys[$j]][$i] . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

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