<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";
//require_once CLASSES_PATH . "AbstractUser.php";
//require_once CLASSES_PATH . "Interfaces" . DIRECTORY_SEPARATOR . "ChangePassword.php";
//require_once CLASSES_PATH . "User.php";
//require_once CLASSES_PATH . "Validation.php";

use \ShopClasses\User;
use \ShopClasses\Validation;

if (!empty($_SESSION['user_id'])) {
    header("Location: /shop/index.php");
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
    // }

    foreach ($_POST as $k => $v) {
        $error[$k] = Validation::notEmpty($k, $v);
        continue;
    }
    $error["email"] = $error["email"] ?? Validation::validEmail($_POST["email"]);
    $error = array_diff($error, array(null));

    if (empty($error)) {
        $user = User::login($_POST['email'], $_POST['password']);
        if (!empty($user)) {
            $_SESSION['user_id'] = $user['user_id'];
            header("Location: /shop/index.php");
            die();
        } else {
            $error['email'] = "Credentials is not valid";
        }
    }
}

require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "login.php";
