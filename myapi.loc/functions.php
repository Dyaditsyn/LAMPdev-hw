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
