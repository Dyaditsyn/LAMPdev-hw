<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

$products = json_to_arr();

if (isset($_POST["submit"])) {
    if (!empty($_POST["products"])) {
        $_SESSION["products"] = [];
        for ($i = 0; $i < count($_POST["products"]); $i++) {
            for ($j = 0; $j < count($products); $j++)
                if ($_POST["products"][$i] === $products[$j]["name"]) {
                    $_SESSION["products"][] = $products[$j];
                }
        }
        header("Location: home.php");
        die();
    }
    header("Location: index.php?error=1");
    die();
}
