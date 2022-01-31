<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

echo "Hello, you selected following products: <br><br>";
foreach ($_SESSION["products"] as $product) {
    echo $product['name'] . "  $" . $product['price'] . "  qty: " . $product['qty'] . "<br>";
}
