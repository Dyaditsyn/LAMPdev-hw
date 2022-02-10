<?php
function json_to_arr($path)
{
    $users = [];
    if (file_exists($path)) {
        $users = file_get_contents($path);
        $users = json_decode($users, true);
    }
    return !empty($users) ? $users : "Error userss.json file opening";
}

function get_user($log, $pass)
{
    $users =  json_to_arr(ROOT_PATH . DIRECTORY_SEPARATOR . "users.json");

    foreach ($users as $user) {
        if (($user['login'] === $log) && ($user['password'] === $pass)) {
            return $user;
            break;
        }
    }
}

function response($status, $message, $data)
{
    header("Content-Type:application/json; charset=utf-8");
    header("HTTP/1.1 " . $status);
    $response = [];
    $response['status'] = $status;
    $response['message'] = $message;
    $response['data'] = $data;

    $jresponse = json_encode($response);
    echo $jresponse;
}

function create_user($log, $pass, $mail)
{
    $user = [];
    $user['login'] = $log;
    $user['password'] = $pass;
    $user['email'] = $mail;
    return $user;
}

function add_user($user, $path)
{
    $usersArr = json_to_arr($path);
    $usersArr[] = $user;
    return $usersArr;
}

function write_user($arr, $path)
{
    $users = json_encode($arr);
    file_put_contents($path, $users);
}
