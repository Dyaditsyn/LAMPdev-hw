<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if ((isset($_POST['submit'])) && ($_POST['submit'] === "Sign in")) {

    $login = $_POST['login'];
    $pass = $_POST['password'];
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
} elseif ((isset($_POST['submit'])) && ($_POST['submit'] === "Sign up")) {
    $name = $_POST['name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $repass = $_POST['repass'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare(
        "
    SELECT
        `email`
    FROM
        `shop`.`users` 
        WHERE 
        `email` = :email
    "
    );
    $stmt->execute(["email" => $email]);
    $result = $stmt->fetch();

    if ($password !== $repass) {
        echo "Password Doesn't match.<br>";
    } elseif (!!$result) {
        echo "Email already exist in database.<br>";
    } else {
        $stmt = $pdo->prepare(
            "
            INSERT INTO `shop`.`users` ( 
                `name`, 
                `login`, 
                `password`, 
                `email` 
            )
            VALUES
                (
                    :name,
                    :login,
                    :password,
                    :email
                )"
        );
        $stmt->execute(["name" => $name, "login" => $login, "password" => $password, "email" => $email]);
        $result = $stmt->fetchAll();
        echo "Success" . "<br> You'll be redirected to the login page in few sec...";
        header("Refresh: 10; url=index.php");
        die();
    }

    echo "You'll be redirected back to registration page in few sec...";
    header("Refresh: 10; url=reg.php");
}
