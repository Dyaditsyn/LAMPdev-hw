<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";
require_once CLASSES_PATH . "AbstractUser.php";
require_once CLASSES_PATH . "Interfaces" . DIRECTORY_SEPARATOR . "ChangePassword.php";
require_once CLASSES_PATH . "User.php";
require_once CLASSES_PATH . "Validation.php";

use \Shop\User;
use \Shop\Validation;

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
    $validation = new Validation($_POST);
    $error = $validation->validateEmail();
    $error = $validation->validatePassword();

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
