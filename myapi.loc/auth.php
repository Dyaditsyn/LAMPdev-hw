<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";
require ROOT_PATH . DIRECTORY_SEPARATOR . "functions.php";

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

header("Content-Type:application/json; charset=utf-8");

$data = json_decode(file_get_contents("php://input"), true);
$userFound = [];

if ((!empty($data['login'])) && (!empty($data['login']))) {
    $login = $data['login'];
    $password = $data['password'];
    $userFound = get_user($login, $password);

    if (empty($userFound)) {
        response(204, "Invalid login or password", NULL);
    } else {
        response(200, "Success", $userFound);
    }
} else {
    response(400, "Invalid Request", NULL);
}

function response($status, $message, $data)
{
    header("HTTP/1.1 " . $status);

    $response['status'] = $status;
    $response['message'] = $message;
    $response['data'] = $data;

    $jresponse = json_encode($response);
    echo $jresponse;
}
