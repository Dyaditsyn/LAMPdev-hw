<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";

use \ShopClasses\User;
use \ShopClasses\Validation;

if (!empty($_SESSION['user_id'])) {
    header("Location: /shop/login.php");
    die();
}

$error = [];
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
    //     if ($k === "email" && User::getUserByEmail($pdo, $v)) {
    //         $error[$k] = "Email is used";
    //         continue;
    //     }
    //     if ($k === "name" && strlen($v) < 4) {
    //         $error[$k] = "Name sould be longer";
    //         continue;
    //     }
    //     if ($k === "name" && strlen($v) > 255) {
    //         $error[$k] = "Name sould be shorter";
    //         continue;
    //     }
    // }

    foreach ($_POST as $k => $v) {
        $error[$k] = Validation::notEmpty($k, $v);
        continue;
    }

    $error["name"] = $error["name"] ?? Validation::fieldLength("name", $_POST["name"], 4, 8);
    $error["email"] = $error["email"] ?? Validation::validEmail($_POST["email"]);
    $error["email"] = $error["email"] ?? Validation::checkExist($_POST["email"]);
    $error["password"] = $error["password"] ?? Validation::confirm("password", $_POST["password"], $_POST["confirm_password"]);

    $error = array_diff($error, array(null));

    if (empty($error)) {
        $user = User::register($_POST['name'],  $_POST['email'], $_POST['password']);
        if (!empty($user)) {
            $_SESSION['user_id'] = $user->id;
            header("Location: /shop/index.php");
            die();
        }
    }
}

require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "register.php";
