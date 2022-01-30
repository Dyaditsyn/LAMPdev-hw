<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";
require ROOT_PATH . DIRECTORY_SEPARATOR . "login.php";

$products = json_to_arr();

if (isset($_POST["submit"])) {
    if (!empty($_POST["products"])) {
        $_SESSION["products"] = $_POST["products"];
        header("Location: home.php");
        die();
    } else {
        $_SESSION["products"] = [];
        echo "No products selected";
        header("Location: login.php?error=1");
        die();
    }
}
