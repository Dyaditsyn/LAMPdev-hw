<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";
require_once FUNCTION_PATH . "db.php";
//require_once CLASSES_PATH . "Product.php";
//require_once CLASSES_PATH . "CartProduct.php";
//require_once CLASSES_PATH . "Cart.php";

use \ShopClasses\Cart;

$cart = Cart::getCartById($_SESSION['cart_id']);
$products = $cart->getProducts();
$totalPrice = $cart->calcTotalProductPrice();
$totalPrice = number_format($totalPrice, 2, '.', ',');

require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "cart.php";
