<?php

declare(strict_types=1);
require_once "config.php";
require_once CLASSES_PATH . "User.php";
require_once CLASSES_PATH . "Worker.php";
require_once CLASSES_PATH . "Student.php";
require_once CLASSES_PATH . "Driver.php";

$worker1 = new Worker("Иван", 25, 1000);
$worker2 = new Worker("Вася", 26, 2000);

$sum = $worker1->getSalary() + $worker2->getSalary();
echo "workers salaries sum is " . $sum;

$driver1 = new Driver("Test", 36, 5000, 6, 'A');
// var_dump($driver1);

$driver2 = new Driver("Test2", 39, 4000, 6, 'f');
// var_dump($driver2);
