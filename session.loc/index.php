<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

// create json file - onece only
// $products = [
//     ["product" => "Bike", "price" => "199", "qty" => "1"],
//     ["product" => "Towels", "price" => "24", "qty" => "3"],
//     ["product" => "Shoes", "price" => "69", "qty" => "2"],
//     ["product" => "Mouse", "price" => "45", "qty" => "1"],
//     ["product" => "Shirt", "price" => "31", "qty" => "4"],
// ];
// file_put_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "products.json", json_encode($products));

if ((!empty($_POST['login'])) && (!empty($_POST['password']))) {
    if (file_exists(ROOT_PATH . DIRECTORY_SEPARATOR . "products.json")) {
        $products = file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "products.json");
        $products = json_decode($products, true);
        foreach ($products as $product) {
            // if ($user['login'] == $_POST['login'] && $user['password'] == $_POST['password']) {
            //     $_SESSION['username'] = $user['login'];
            //     header("Location: /login_example/home.php");
            //     die();
            // }
        }
    }
    header("Location: /login_example/login.php?error=1");
    die();
}

require_once(ROOT_PATH . DIRECTORY_SEPARATOR . "login.php");
