<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";
require_once FUNCTION_PATH . "db.php";

$products = [];
$allProducts = getAllProducts($pdo, 1, 100);

$_SESSION['products'] =  $_SESSION['products'] ?? [];
foreach ($allProducts as $product) {
    if (in_array($product['name'], $_SESSION['products'])) {
        $products[] = $product;
    }
}

require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "cart.php";
