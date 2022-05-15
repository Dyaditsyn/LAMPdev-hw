<?php

function generateSignature($username, $time)
{
    $salt = '13wrwerwe44';
    return sha1($username . $time . $salt);
}
