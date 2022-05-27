<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";
require_once CLASSES_PATH . "AbstractUser.php";
require_once CLASSES_PATH . "Interfaces" . DIRECTORY_SEPARATOR . "ChangePassword.php";
require_once CLASSES_PATH . "User.php";

if (!empty($_SESSION['user_id'])) {
    header("Location: /shop/login.php");
    die();
}

$error = [];
if (!empty($_POST)) {
    foreach ($_POST as $k => $v) {
        if (empty($v)) {
            $error[$k] = "Field should be filled";
            continue;
        }
        if ($k === "email" && !filter_var($v, FILTER_VALIDATE_EMAIL)) {
            $error[$k] = "Email is not valid";
            continue;
        }
        if ($k === "email" && User::getUserByEmail($pdo, $v)) {
            $error[$k] = "Email is used";
            continue;
        }
        if ($k === "name" && strlen($v) < 4) {
            $error[$k] = "Name sould be longer";
            continue;
        }
        if ($k === "name" && strlen($v) > 255) {
            $error[$k] = "Name sould be shorter";
            continue;
        }
    }
    if ($_POST['password'] != $_POST['confirm_password']) {
        $error[$k] = "Passwords don't match";
    }

    if (empty($error)) {
        $user = User::register($pdo, $_POST['name'],  $_POST['email'], $_POST['password']);
        if (!empty($user)) {
            $_SESSION['user_id'] = $user->id;
            header("Location: /shop/index.php");
            die();
        }
    }
}

require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "register.php";
