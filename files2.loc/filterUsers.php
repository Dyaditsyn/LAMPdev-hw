<?php

require(ROOT_PATH . DIRECTORY_SEPARATOR . "addUsers.php");
$filteredUsers = [];
foreach ($usersData as $user) {
    if (strlen($user["password"]) < 8) {
        $filteredUsers[] = $user;
    }
}
