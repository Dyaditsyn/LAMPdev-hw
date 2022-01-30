<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";
function json_to_arr()
{
    $products = [];
    if (file_exists(ROOT_PATH . DIRECTORY_SEPARATOR . "products.json")) {
        $products = file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "products.json");
        $products = json_decode($products, true);
    }
    return !empty($products) ? $products : "Error products.json file opening";
}
