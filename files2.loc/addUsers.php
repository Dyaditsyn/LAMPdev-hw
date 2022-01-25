<?php
$keys = ["name", "login", "password", "email", "language"];
$usersData = [];

$userFile = fopen(ROOT_PATH . DIRECTORY_SEPARATOR . "users.txt", "r");
if (!$userFile) {
    echo "Eror file opening";
    die();
}

while (!feof($userFile)) {
    $currentValues = explode(" ", fgets($userFile));
    $usersData[] = array_combine($keys, $currentValues);
}

fclose($userFile);
