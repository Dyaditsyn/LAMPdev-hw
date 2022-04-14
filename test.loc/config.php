<?php
define("ROOT_PATH", dirname(__FILE__));
define("DB_NAME", "test");
define("DB_USER", "phpmyadmin");
define("DB_PASSWORD", "1111");

$dsn = "mysql:host=localhost;port3306;dbname=" . DB_NAME . ";charset=utf8";
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
var_dump($pdo);

session_start(); // прописать в конфиге чтоб хранились сеансы пользователей
