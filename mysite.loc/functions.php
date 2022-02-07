//<?php
    function json_to_arr($path)
    {
        $users = [];
        if (file_exists($path)) {
            $users = file_get_contents($path);
            $users = json_decode($users, true);
        }
        return !empty($users) ? $users : "Error products.json file opening";
    }
