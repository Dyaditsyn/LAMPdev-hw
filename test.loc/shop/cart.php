<?php
//lecture dec2
require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";
require_once FUNCTION_PATH . "db.php";

$products = getCartProducts($pdo, ($_SESSION['cart_id'] ?? 0), 1, 100);

require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "cart.php";
