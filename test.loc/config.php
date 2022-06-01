<?php
define("ROOT_PATH", dirname(__FILE__));
define("FUNCTION_PATH", ROOT_PATH . DIRECTORY_SEPARATOR . "functions" . DIRECTORY_SEPARATOR);
define("CLASSES_PATH", ROOT_PATH . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR);
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH);
$dotenv->load();

spl_autoload_register(function ($class) { // имя неймспейса должно четко соответствовать названию папки 
    $className = ltrim($class, '\\');
    $fileName  = ' ';
    $namespace = ' ';
    if ($lastNsPos = strrpos($className, '\\')) { // позиция последнего обратного слэша (обратная черта дублируется потому что экранируется)
        $namespace = substr($className, 0, $lastNsPos); // отделяет неймспейс
        $className = substr($className, $lastNsPos + 1); // отделяет имя класса
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    require $fileName;
});

session_start(); // прописать в конфиге чтоб хранились сеансы пользователей
