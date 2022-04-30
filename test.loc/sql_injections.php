<?php

declare(strict_types=1);
require_once "config.php";

if (!empty($_POST)) {

    //$login = "test' OR 1=1 -- habrahabra";
    $login = $_POST['login'];
    $pass = $_POST['password'];
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // только ассоциативный массив

    // $stmt = $pdo->query(
    //     "
    // SELECT
    //     `user_id`,
    //     `user_name`
    // FROM
    //     `test`.`users` 
    // WHERE
    //     `user_name` = '$login' and `password` = '$pass'
    // "
    // );

    // var_dump($stmt);

    $stmt = $pdo->prepare(
        "
    SELECT
        `user_id`,
        `user_name`
    FROM
        `test`.`users` 
    WHERE
        `user_name` = :name and `password` = :password
    "
    );

    $stmt->execute(["name" => $login, "password" => $pass]);

    $result = $stmt->fetch(); // возвращает многомерный массив
    if (!empty($result)) {
        echo "you are logged!";
    } else {
        echo "Login or password is invalid!";
    }
}
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PHP files</title>
    <link type="text/css" rel="stylesheet" href="styles.css">
</head>

<body>

    <?php if (!empty($_GET['error'])) : ?>
        <h3>Login or password invalid</h3>
    <?php endif; ?>

    <div class="main_page">
        <form method="POST" action="sql_injections.php">
            <ul class="wrapper">
                <li class="form-row">
                    <label for="login">Enter your login:</label>
                    <input type="text" name="login" id="login" placeholder="login" value="" />
                </li>
                <li class="form-row">
                    <label for="password">Enter a Password:</label>
                    <input type="password" name="password" id="password" placeholder="password" value="" />
                </li>
                <li class="check">
                    <label for="remember">Remember me</label>
                    <input type="checkbox" name="remember" id="remember" />
                </li>
                <li class="form-row">
                    <input type="submit" value="Sign in" />
                </li>
            </ul>
        </form>
    </div>
</body>

</html>