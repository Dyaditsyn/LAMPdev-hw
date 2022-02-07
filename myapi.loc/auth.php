<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";
require ROOT_PATH . DIRECTORY_SEPARATOR . "functions.php";
$products = json_to_arr(ROOT_PATH . DIRECTORY_SEPARATOR . "products.json");
?>

<?php if (!empty($_GET['error'])) : ?>
    <h3>Login or password invalid</h3>
<?php endif;

// $users = [
//     ["login" => "Test", "password" => "test", "email" => "test@test.com"],
//     ["login" => "Anton", "password" => "111", "email" => "anton@gmail.com"],
//     ["login" => "Stewart", "password" => "222", "email" => "stewart@gmail.com"],
//     ["login" => "Bernardo", "password" => "333", "email" => "bernardo@gmail.com"],
//     ["login" => "Maximillian", "password" => "444", "email" => "maximilian@gmail.com"],
//     ["login" => "Tyler", "password" => "555", "email" => "tyler@gmail.com"],
//     ["login" => "Sedrick", "password" => "666", "email" => "sedrick@gmail.com"]
// ];

// file_put_contents("users.json", json_encode($users));


if ((!empty($_POST['login'])) && (!empty($_POST['password']))) {
    if (file_exists(ROOT_PATH . DIRECTORY_SEPARATOR . "users.json")) {
        $users = file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "users.json");
        $users = json_decode($users, true); // преобразуем джейсон строку в массив благодаря параметру тру
        foreach ($users as $user) {
            if ($user['login'] == $_POST['login'] && $user['password'] == $_POST['password']) {
                $_SESSION['login'] = $user['login'];
                if (!empty($_POST["remember"])) {
                    $time = time();
                    $cookie = $user['login'] . ":" . $time . ":" . generateSignature($user['login'], $time);
                    setcookie("login", $cookie, time() + (10 * 365 * 24 * 60 * 60));
                }
                header("Location: http://www.mysite.loc/home.php");
                die();
            }
        }
    }
    header("Location: http://www.mysite.loc/login.php?error=1");
    die();
}
