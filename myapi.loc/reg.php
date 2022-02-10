<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";
require ROOT_PATH . DIRECTORY_SEPARATOR . "functions.php";

$data = json_decode(file_get_contents("php://input"), true);

if ((!empty($data['login'])) && (!empty($data['password'])) &&  (!empty($data['repass'])) &&  (!empty($data['email']))) {

    if (check_user($data['login'])) {
        response(204, "Login already in use", NULL);
    } elseif ($data['password'] === $data['repass']) {
        $login = $data['login'];
        $password = $data['password'];
        $email = $data['email'];
        $user =  create_user($login, $password, $email);
        $usersArr = add_user($user, ROOT_PATH . DIRECTORY_SEPARATOR . "users.json");
        write_user($usersArr, ROOT_PATH . DIRECTORY_SEPARATOR . "users.json");
        response(200, "Success", $user);
    } elseif ($data['password'] !== $data['repass']) {
        response(204, "Password doesn't match", NULL);
    }
} else {
    response(400, "Invalid Request", NULL);
}
