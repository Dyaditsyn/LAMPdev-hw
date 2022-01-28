<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

// create json file
// $users = [
//     ["login" => "login1", "password" => '1'],
//     ["login" => "login2", "password" => '2'],
//     ["login" => "login3", "password" => '3']
// ];

// file_put_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "users.json", json_encode($users));

if ((!empty($_POST['login'])) && (!empty($_POST['password']))) {
    if (file_exists(ROOT_PATH . DIRECTORY_SEPARATOR . "users.json")) {
        $users = file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "users.json");
        $users = json_decode($users, true); // преобразуем джейсон строку в массив благодаря параметру тру
        foreach ($users as $user) {
            if ($user['login'] == $_POST['login'] && $user['password'] == $_POST['password']) {
                if (file_exists(ROOT_PATH . DIRECTORY_SEPARATOR . $user['login'] . ".json")) {
                    $flogin = file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . $user['login'] . ".json");
                    $flogin = json_decode($flogin, true);
                    $flogin['logins'] = $flogin['logins'] + 1;
                    file_put_contents(ROOT_PATH . DIRECTORY_SEPARATOR . $user['login'] . ".json", json_encode($flogin));
                } else {
                    file_put_contents(ROOT_PATH . DIRECTORY_SEPARATOR . $user['login'] . ".json",  json_encode(["logins" => 1]));
                }
            }
        }
    }
}

require_once(ROOT_PATH . DIRECTORY_SEPARATOR . "login.php");
