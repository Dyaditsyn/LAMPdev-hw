<?php
define("ROOT_PATH", dirname(__FILE__));
define("FUNCTION_PATH", ROOT_PATH . DIRECTORY_SEPARATOR . "functions" . DIRECTORY_SEPARATOR);
define("CLASSES_PATH", ROOT_PATH . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR);
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH);
$dotenv->load();


session_start(); // прописать в конфиге чтоб хранились сеансы пользователей
