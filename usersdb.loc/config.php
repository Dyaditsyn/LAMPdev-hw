<?php
define("ROOT_PATH", dirname(__FILE__));
define("FUNCTION_PATH", ROOT_PATH . DIRECTORY_SEPARATOR . "functions" . DIRECTORY_SEPARATOR);
define("DB_NAME", "shop");
define("DB_USER", "phpmyadmin");
define("DB_PASSWORD", "1111");

require_once FUNCTION_PATH . "functions.php";
require_once FUNCTION_PATH . "db.php";

$dsn = "mysql:host=localhost;port3306;dbname=" . DB_NAME . ";charset=utf8";

try {
    $pdo = new pdo(
        $dsn,
        DB_USER,
        DB_PASSWORD,
        //array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
    json_encode(array('outcome' => true));
} catch (PDOException $ex) {
    json_encode(array('outcome' => false, 'message' => 'Unable to connect'));
}
//$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

session_start(); // прописать в конфиге чтоб хранились сеансы пользователей