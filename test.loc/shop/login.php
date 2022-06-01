<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";

use \ShopClasses\User;
use \ShopClasses\Validation;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

if (!empty($_SESSION['user_id'])) {
    header("Location: /shop/index.php");
    die();
}

$error = [];
$logger;
if (!empty($_POST)) {
    // foreach ($_POST as $k => $v) {
    //     if (empty($v)) {
    //         $error[$k] = "Field should be filled";
    //         continue;
    //     }
    //     if ($k === "email" && !filter_var($v, FILTER_VALIDATE_EMAIL)) {
    //         $error[$k] = "Email is not valid";
    //         continue;
    //     }
    // }

    foreach ($_POST as $k => $v) {
        $logger = new Logger($k);
        $logger->pushHandler(new StreamHandler(ROOT_PATH . '/logs/login.log', Logger::DEBUG));
        $logger->info($v);
        $error[$k] = Validation::notEmpty($k, $v);
        continue;
    }
    $error["email"] = $error["email"] ?? Validation::validEmail($_POST["email"]);
    $error = array_diff($error, array(null));

    $logger = new Logger('Login status');
    $logger->pushHandler(new StreamHandler(ROOT_PATH . '/logs/login.log', Logger::DEBUG));

    if (empty($error)) {
        $logger->info('Succes');
        $user = User::login($_POST['email'], $_POST['password']);
        if (!empty($user)) {
            $_SESSION['user_id'] = $user['user_id'];
            header("Location: /shop/index.php");
            die();
        } else {
            $error['email'] = "Credentials is not valid";
        }
    }
    $logger->error('Failed');
}

require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "login.php";
