<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

if (empty($_SESSION['products'])) {
    header("Location: login.php");
    die();
}

echo "Hello, you selected following products:";
echo "<pre>";
for ($i = 0; $i < count($_SESSION["products"]); $i++) {
    echo $_SESSION["products"][$i] . "<br>";
}
echo "</pre>";
