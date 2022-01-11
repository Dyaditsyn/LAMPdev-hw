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

$b = rand(1, 100);
$a = rand(-5, 10);
echo $a;
if ($a > 0) {
    echo "Число положительное!";
} elseif ($a  < 0) {
    echo "Число отрицательное!";
} else {
    echo "Число - ноль";
}

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