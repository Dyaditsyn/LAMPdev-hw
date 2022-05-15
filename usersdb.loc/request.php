<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if ((isset($_POST['submit'])) && ($_POST['submit'] === "Sign in")) {

    $login = $_POST['login'];
    $pass = $_POST['password'];
    $userFound = getUserByLoginAndPass($pdo, $login, $pass);

    if (!empty($userFound)) {
        $_SESSION['user'] = $userFound;
        if (!empty($_POST["remember"])) {
            $time = time();
            $cookie = $login . ":" . $time . ":" . generateSignature($login, $time);
            setcookie("login", $cookie, time() + (10 * 365 * 24 * 60 * 60));
        }
        header("Location: /home.php");
        die();
    } else {
        header("Location: /index.php?error=1");
        die();
    }
} elseif ((isset($_POST['submit'])) && ($_POST['submit'] === "Sign up")) {
    $name = $_POST['name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $repass = $_POST['repass'];
    $email = $_POST['email'];

    $emailFound = getUserEmail($pdo, $email);
    if ($password !== $repass) {
        echo "Password Doesn't match.<br>";
    } elseif (!!$emailFound) {
        echo "Email already exist in database.<br>";
    } else {
        $result = addUser($pdo, $name, $login, $password, $email);
        echo "Success" . "<br> You'll be redirected to the login page in few sec...";
        header("Refresh: 10; url=/index.php");
        die();
    }

    echo "You'll be redirected back to registration page in few sec...";
    header("Refresh: 10; url=/reg.php");
}
