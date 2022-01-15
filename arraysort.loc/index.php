<?php
// ? Пример из класса с универсальными значениями

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

echo "</table>", "<hr>";

$users = [
    "5" => ["name" => "Test", "email" => "test@test.com", "lang" => "ru"],
    "3" => ["name" => "Anton", "email" => "anton@gmail.com",  "lang" => "ua"],
    "44" => ["name" => "Anton", "email" => "anton3@gmail.com",  "lang" => "ua"],
    "1" => ["name" => "Stewart", "email" => "stewart@gmail.com",  "lang" => "en"],
    "23" => ["name" => "Bernardo", "email" => "bernardo@gmail.com",  "lang" => "fr"],
    "33" => ["name" => "Bernardo", "email" => "bernardo2@gmail.com",  "lang" => "fr"],
    "11" => ["name" => "Maximillian", "email" => "maximilian@gmail.com",  "lang" => "de"],
    "17" => ["name" => "Tyler", "email" => "tyler@gmail.com",  "lang" => "en"],
    "8" => ["name" => "Sedrick", "email" => "sedrick@gmail.com",  "lang" => "ru"],
    "24" => ["name" => "Anton", "email" => "anton2@gmail.com",  "lang" => "ua"],
];

echo "Original data", "<pre>";
print_r($users);
echo "</pre>";


//  ? - выведите на экран имена пользователей, которые встречаются более одного раза и количество повторений имени;
$namesRep = [];
$rep = 1;

foreach ($users as $user) {
    if (isset($namesRep[$user["name"]])) {
        $namesRep[$user["name"]]++;
    } else {
        $namesRep[$user["name"]] = $rep;
    }
}

echo "Popular names", "<pre>";
foreach ($namesRep as $key => $val) {
    if ($val > 1) {
        echo $key . " repeats " . $val . " times " . "<br>";
    }
}
echo "<hr>" . "</pre>";

// ? - разделите пользователей на массивы по языку, каждый массив будет содержать пользователей с одинаковым языком;
$langs = [];
foreach ($users as $user) {
    if (!in_array($user["lang"], $langs)) {
        $langs[] =  $user["lang"];
    }
}

$userLangs = [];
for ($i = 0; $i < count($langs); $i++) {
    foreach ($users as $user) {
        if ($user["lang"] === $langs[$i]) {
            $userLangs[$langs[$i]][] = $user;
        }
    }
}

echo "Users per Language", "<pre>";
print_r($userLangs);
echo  "<hr>" . "</pre>";

// ?- с помощью цикла сформируйте новый массив, содержащий пользователей в обратном порядке от исходного массива (первый пользователь станет последним, второй — предпоследним и т.д.)
$revUsers = [];
end($users);
for ($i = 0; $i < count($users); $i++) {
    $revUsers[] = current($users);
    prev($users);
}

echo "Users in reversed order", "<pre>";
print_r($revUsers);
echo "<hr>" . "</pre>";

// ! Дополнительные задачи с сайта http://old.code.mu/tasks/php/base/rabota-s-ciklami-foreach-for-while-v-php.html - посложнее
// ? 17. С помощью цикла for заполните массив числами от 1 до 100. То есть у вас должен получится массив [1, 2, 3... 100].
$numbers = [];
for ($i = 1; $i <= 100; $i++) {
    $numbers[] = $i;
}

echo "Numbers from 1 to 100", "<pre>";
print_r($numbers);
echo "<hr>" . "</pre>";

// ? 18. Дан массив $arr. С помощью цикла foreach запишите английские названия в массив $en, а русские - в массив $ru.
$arr = ['green' => 'зеленый', 'red' => 'красный', 'blue' => 'голубой'];
foreach ($arr as $eng => $rus) {
    $en[] = $eng;
    $ru[] = $rus;
}

echo "RU EN Arrays", "<pre>";
print_r($en);
print_r($ru);
echo "<hr>" . "</pre>";

// ? Дано число $num=1000. Делите его на 2 столько раз, пока результат деления не станет меньше 50. Какое число получится? 
// ? Посчитайте количество итераций, необходимых для этого (итерация - это проход цикла). Решите задачу сначала через цикл while, а потом через цикл for.
$num = 1000;
$res = $num;
$iter = 0;

while ($res >= 50) {
    $res /= 2;
    $iter++;
}

echo "Dividing by 2 using While", "<pre>";
var_dump("Final result: " . $res . ". Iterations: " . $iter) . "<br>";
echo "</pre>";


for ($res2 = $num, $i = 0; $res2 >= 50; $res2 /= 2, $i++);
echo "Dividing by 2 using For", "<pre>";
var_dump("Final result: " . $res2 . ". Iterations: " . $i) . "<br>";
echo "</pre>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PHP Array Sorting Methods</title>
</head>

<body>
    <div class="main_page">
        <!-- <h1>PHP Array Sorting Methods </h1> -->
    </div>
</body>

</html>