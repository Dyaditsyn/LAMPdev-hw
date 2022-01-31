<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

if (empty($_SESSION['username'])) {
    if (!empty($_COOKIE["username"])) {
        list($userName, $time, $signature) = explode(':', $_COOKIE["username"]);
        var_dump($userName, $time, $signature);
        if (generateSignature($userName, $time) == $signature) {
            $_SESSION["username"] = $userName;
        } else {
            header("Location: /login_example/login.php");
            die();
        }
    } else {
        header("Location: /login_example/login.php");
        die();
    }
}
echo "Hello, " . $_SESSION['username'];
