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

function generateSignature($username, $time)
{
    $salt = '13wrwerwe44';
    return sha1($username . $time . $salt);
}
