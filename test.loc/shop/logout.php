<?php

require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";
session_destroy();

header("Location: /shop/login.php");
die();
