<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";
require_once FUNCTION_PATH . "db.php";
require_once CLASSES_PATH . "Cart.php";

$cart = unserialize($_SESSION['cart']);
$products = $cart->getCartProducts($pdo, ($_SESSION['cart_id'] ?? 0), 1, 100);
$totalPrice = $cart->calcTotalProductPrice($pdo, ($_SESSION['cart_id'] ?? 0));
$totalPrice = number_format($totalPrice, 2, '.', ',');

require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "cart.php";
