<?php
define("ROOT_PATH", dirname(__FILE__));
define("FUNCTION_PATH", ROOT_PATH . DIRECTORY_SEPARATOR . "functions" . DIRECTORY_SEPARATOR);
define("CLASSES_PATH", ROOT_PATH . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR);
define("DB_NAME", "test");
define("DB_USER", "phpmyadmin");
define("DB_PASSWORD", "1111");

require_once CLASSES_PATH . "Db.php";

// $dsn = "mysql:host=localhost;port3306;dbname=" . DB_NAME . ";charset=utf8";

// try {
//     $pdo = new pdo(
//         $dsn,
//         DB_USER,
//         DB_PASSWORD,
//         array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
//     );
//     json_encode(array('outcome' => true));
// } catch (PDOException $ex) {
//     json_encode(array('outcome' => false, 'message' => 'Unable to connect'));
// }
//$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

spl_autoload_register(function ($class) {
    // Получам путь к файлу из имени класс
    // $path = __DIR__ . $class . 'php';
    // // Если в текущей папке есть такой файл, то выполняем код из него
    // if (file_exists($path)) {
    //     require_once $path;
    // }
    // Если файла нет, то ничего не делаем
});

session_start(); // прописать в конфиге чтоб хранились сеансы пользователей
