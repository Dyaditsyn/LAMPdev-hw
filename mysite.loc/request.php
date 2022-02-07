<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

// require ROOT_PATH . DIRECTORY_SEPARATOR . "functions.php";
// $products = json_to_arr(ROOT_PATH . DIRECTORY_SEPARATOR . "products.json");

// if (isset($_POST["submit"])) {
//     if (!empty($_POST["products"])) {
//         $_SESSION["products"] = [];
//         for ($i = 0; $i < count($_POST["products"]); $i++) {
//             for ($j = 0; $j < count($products); $j++)
//                 if ($_POST["products"][$i] === $products[$j]["name"]) {
//                     $_SESSION["products"][] = $products[$j];
//                 }
//         }
//         header("Location: home.php");
//         die();
//     }
//     header("Location: index.php?error=1");
//     die();
// }

// if (isset($_POST["submit"])) {
//     if (!empty($_POST["products"])) {
//         $_SESSION["products"] = [];
//         for ($i = 0; $i < count($_POST["products"]); $i++) {
//             for ($j = 0; $j < count($products); $j++)
//                 if ($_POST["products"][$i] === $products[$j]["name"]) {
//                     $_SESSION["products"][] = $products[$j];
//                 }
//         }
//         header("Location: home.php");
//         die();
//     }
//     header("Location: index.php?error=1");
//     die();
// }

if ((isset($_POST['submit'])) && ($_POST['submit'] === "Sign in")) {

    $username = $_POST['login'];
    $password = $_POST['password'];
    $URL = 'http://www.myapi.loc/auth.php';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    $result = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
    curl_close($ch);

    echo 'result: <pre>';
    echo json_decode($result);
    echo '</pre>';
    echo 'status: <pre>';
    print_r($status_code);
    echo '</pre>';
    //echo "It came from LOGIN page";
} // elseif ((isset($_POST['submit'])) && ($_POST['submit'] === "Sign up")) {

//     $payload = json_encode([
//         "login" => $_POST['login'],
//         "password" => $_POST['password'],
//         "re-password" => $_POST['re-password'],
//         "email" => $_POST['email'],
//         "remember" => $_POST['remember']
//     ]);

//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, "'http://www.myapi.loc/create.php';");
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//     $output = curl_exec($ch);
//     curl_close($ch);

//     echo "It came from REG page";
// }
