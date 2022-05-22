<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";
require_once FUNCTION_PATH . "db.php";
require_once CLASSES_PATH . "Product.php";
//require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "partials" . DIRECTORY_SEPARATOR . "header.php";

$products = json_decode(file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "shop" . DIRECTORY_SEPARATOR . "products.json"), true);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_COLUMN);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
foreach ($products as $product) {
    $categoryId = getCategoryIdByName($pdo, $product['category']);
    $newProduct = new Product($categoryId, $product['name'], $product['price'], $product['quantity']);
    $newProduct->addProduct($pdo, $product['name'], $product['price'], $product['quantity'], $categoryId);
}

$_SESSION['newProduct'] = serialize($newProduct);

//require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "products.php";
