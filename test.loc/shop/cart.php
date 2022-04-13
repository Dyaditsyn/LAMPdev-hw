<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";

$products = [];
$allProducts =  json_decode(file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "shop" . DIRECTORY_SEPARATOR . "products.json"), true);

$_SESSION['products'] =  $_SESSION['products'] ?? [];
foreach ($allProducts as $product) {
    if (in_array($product['name'], $_SESSION['products'])) {
        $products[] = $product;
    }
}

require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "cart.php";
