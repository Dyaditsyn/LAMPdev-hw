<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

if ((!empty($_POST['login'])) && (!empty($_POST['password']))) {
    if (file_exists(ROOT_PATH . DIRECTORY_SEPARATOR . "users.json")) {
        $users = file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "users.json");
        $users = json_decode($users, true); // преобразуем джейсон строку в массив благодаря параметру тру
        foreach ($users as $user) {
            if ($user['login'] == $_POST['login'] && $user['password'] == $_POST['password']) {
                $_SESSION['username'] = $user['login'];
                header("Location: /login_example/home.php");
                die();
            }
        }
    }
    header("Location: /login_example/login.php?error=1");
    die();
}

require_once(ROOT_PATH . DIRECTORY_SEPARATOR . "login.php");
