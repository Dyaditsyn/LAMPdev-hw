<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

if (!isset($_SESSION['user'])) {
    header("Location: /index.php?error=1");
    die();
}

echo "This is a home page for authorized users: <br><br>";
echo "Hello, " . $_SESSION['user']['name'];
