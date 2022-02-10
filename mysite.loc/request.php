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
    curl_close($ch);

    $resultArr = json_decode($result, true);

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
} elseif ((isset($_POST['submit'])) && ($_POST['submit'] === "Sign up")) {

    $url = 'http://www.myapi.loc/reg.php';
    $payload = json_encode([
        "login" => $_POST['login'],
        "password" => $_POST['password'],
        "repass" => $_POST['repass'],
        "email" => $_POST['email'],
    ]);

    $ch = curl_init($url);
    # Setup request to send json via POST.
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    # Return response instead of printing.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Send request.
    $result = curl_exec($ch);
    curl_close($ch);

    $resultArr = json_decode($result, true);
    var_dump($resultArr);
    echo "result <pre>";
    print_r($resultArr);
    echo "</pre>";

    //     echo $resultArr['message'] . "<br>";

    //     if ($resultArr['status'] === 200) {
    //         echo "<pre>";
    //         print_r($resultArr['data']);
    //         echo "</pre>";
    //     }
}
