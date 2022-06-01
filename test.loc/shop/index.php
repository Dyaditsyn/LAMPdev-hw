<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";

use \ShopClasses\Product;
use \ShopClasses\Cart;
use \ShopClasses\CartProduct;
use \ShopClasses\Lib\Product as LibProduct;

if (empty($_SESSION['user_id'])) {
    header("Location: /shop/login.php");
    die();
}

// $products = [
//     ['name' => 'Apple iPhone 11 Pro Max', 'price' => 47999, 'quantity' => 15, 'category' => "Apple"],
//     ['name' => 'Apple Watch Series 6 GPS', 'price' => 15799, 'quantity' => 21, 'category' => "Apple"],
//     ['name' => 'Samsung Galaxy S20', 'price' => 32999, 'quantity' => 17, 'category' => "Samsung"],
//     ['name' => 'Samsung Galaxy Watch 3', 'price' => 10999, 'quantity' => 19, 'category' => "Samsung"],
//     ['name' => 'Xiaomi Mi 10T Pro', 'price' => 15999, 'quantity' => 23, 'category' => "Xiaomi"],
//     ['name' => 'Xiaomi Mi Smart Band 4 NFC', 'price' => 1299, 'quantity' => 14, 'category' => "Xiaomi"]
// ];
// file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'products.json', json_encode($products));

$products = Product::getAll();

if (!empty($_POST['products'])) {
    if (!empty($_SESSION['cart_id'])) {
        $cart = Cart::getCartById($_SESSION['cart_id']);
        $cart->clearCart();
    } else {
        $cart = Cart::create($_SESSION['user_id']);
        $_SESSION['cart_id'] = $cart->getId();
    }
    $cartProducts = [];
    foreach ($_POST['products'] as $product) {
        $quantity = $_POST['quantity_' . $product];
        $cartProducts[] = CartProduct::create($_SESSION['cart_id'], (int) $product, (int) $quantity);
    }
    $cart->setProducts($cartProducts);
    // echo "<pre>";
    // print_r($cart);
    // echo "</pre>";
    header("location: /shop/cart.php");
    die();
}

require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "products.php";
