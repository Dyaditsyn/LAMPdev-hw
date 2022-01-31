<?php
function json_to_arr($path)
{
    $prods = [];
    if (file_exists($path)) {
        $prods = file_get_contents($path);
        $prods = json_decode($prods, true);
    }
    return !empty($prods) ? $prods : "Error products.json file opening";
}
