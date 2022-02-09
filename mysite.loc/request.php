<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

if ((isset($_POST['submit'])) && ($_POST['submit'] === "Sign in")) {

    $url = 'http://www.myapi.loc/auth.php';

    $ch = curl_init($url);
    # Setup request to send json via POST.
    $payload = json_encode(["login" => $_POST['login'], "password" => $_POST['password']]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    # Return response instead of printing.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Send request.
    $result = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $resultArr = json_decode($result, true);

    echo 'result: <pre>';
    print_r($resultArr);
    echo '</pre>';

    if ($resultArr['status'] === 200) {
        $_SESSION['user'] = $resultArr['data'];
        if (!empty($_POST["remember"])) {
            $time = time();
            $cookie = $user['login'] . ":" . $time . ":" . generateSignature($user['login'], $time);
            setcookie("login", $cookie, time() + (10 * 365 * 24 * 60 * 60));
        }
        header("Location: http://www.mysite.loc/home.php");
        die();
    } else {
        header("Location: http://www.mysite.loc/index.php?error=1");
        die();
    }
} 

// elseif ((isset($_POST['submit'])) && ($_POST['submit'] === "Sign up")) {

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
