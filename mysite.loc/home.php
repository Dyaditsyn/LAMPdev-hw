<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";

echo "This is a home page for authorized users: <br><br>";
echo "Hello, " . $_SESSION['login'];
