<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";

//require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "partials" . DIRECTORY_SEPARATOR . "header.php";

// $products = [
//     ['name' => 'Apple iPhone 11 Pro Max', 'price' => 47999, 'quantity' => 15],
//     ['name' => 'Apple Watch Series 6 GPS', 'price' => 15799, 'quantity' => 21],
//     ['name' => 'Samsung Galaxy S20', 'price' => 32999, 'quantity' => 17],
//     ['name' => 'Samsung Galaxy Watch 3', 'price' => 10999, 'quantity' => 19],
//     ['name' => 'Xiaomi Mi 10T Pro', 'price' => 15999, 'quantity' => 23],
//     ['name' => 'Xiaomi Mi Smart Band 4 NFC', 'price' => 1299, 'quantity' => 14]
// ];
// file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'products.json', json_encode($products));

$products = json_decode(file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "shop" . DIRECTORY_SEPARATOR . "products.json"), true);

if (!empty($_POST['products'])) {
    $_SESSION['products'] = $_POST['products'];
    header("location: /shop/cart.php");
    die();
}

require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "products.php";
