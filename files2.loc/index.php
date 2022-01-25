<?php
//? - создать текстовый файл, содержащий данные зарегистрированного пользователя (имя, логин, пароль, емейл, язык);
//? - далее создать php файл, который будет считывать данные пользователя и заносить их в массив;
//? - подключить этот файл в основной php файл (index.php);
//? - далее создать новый php файл, который будет фильтровать пользователей в массиве, у которых длина пароля меньше 8 символов;
//? - подключить его в основной файл после файла, считывающего данные из текстового файла в массив;
//? - в основном файле вывести полученный отфильтрованный массив пользователей на экран.

define("ROOT_PATH", dirname(__FILE__));

require(ROOT_PATH . DIRECTORY_SEPARATOR . "addUsers.php");
require(ROOT_PATH . DIRECTORY_SEPARATOR . "filterUsers.php");

echo '<pre>';
print_r($filteredUsers);
echo '</pre>';

require_once(ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "main.php");
