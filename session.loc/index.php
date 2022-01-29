<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

if (file_exists(ROOT_PATH . DIRECTORY_SEPARATOR . "products.json")) {
    $products = file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "products.json");
    $products = json_decode($products, true);
} else {
    echo "Error while products.json file opening";
}

if (!empty($_POST["products"])) {
    $_SESSION["products"] = $_POST["products"];
    header("Location: home.php");
    die();
}

require ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "prod.php";
require ROOT_PATH . DIRECTORY_SEPARATOR . "login.php";

// header("Location: login.php?error=1");
// die();
