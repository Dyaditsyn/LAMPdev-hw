<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

if ((isset($_POST['submit'])) && ($_POST['submit'] === "Sign in")) {

    $login = $_POST['login'];
    $pass = $_POST['password'];
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $stmt = $pdo->prepare(
        "
    SELECT
        `id`,
        `name`
    FROM
        `shop`.`users` 
    WHERE
        `login` = :login and `password` = :password
    "
    );

    $stmt->execute(["login" => $login, "password" => $pass]);

    $result = $stmt->fetch();

    if (!empty($result)) {
        $_SESSION['user'] = $result;
        if (!empty($_POST["remember"])) {
            $time = time();
            $cookie = $login . ":" . $time . ":" . generateSignature($login, $time);
            setcookie("login", $cookie, time() + (10 * 365 * 24 * 60 * 60));
        }
        header("Location: http://www.usersdb.loc/home.php");
        die();
    } else {
        header("Location: http://www.usersdb.loc/index.php?error=1");
        die();
    }
}

// elseif ((isset($_POST['submit'])) && ($_POST['submit'] === "Sign up")) {

//     $url = 'http://www.myapi.loc/reg.php';
//     $payload = json_encode([
//         "login" => $_POST['login'],
//         "password" => $_POST['password'],
//         "repass" => $_POST['repass'],
//         "email" => $_POST['email'],
//     ]);


//     if ($resultArr['status'] === 200) {
//         echo $resultArr['message'] . "<br> You'll be redirected to login page in 10sec... <br>";
//         header("Refresh: 30; url=index.php");
//         echo "<pre>";
//         print_r($resultArr['data']);
//         echo "</pre>";
//     } else {
//         echo $resultArr['message'] . " <br> You'll be redirected back to registration page in 10sec...<br>";

//         header("Refresh: 30; url=reg.php");
//     }
// }
