<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

if (empty($_SESSION['username'])) {
    header("Location: /login_example/login.php");
    die();
}
echo "Hello, " . $_SESSION['username'];
