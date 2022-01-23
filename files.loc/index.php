<?php

//? Создать текстовый файл в любом редакторе, каждая строка которого содержит логин и пароль пользователя, отделенных пробелом в виде
//? login pass
//? login1 123456
//? затем создать форму ввода логина и пароля на html, при сабмите формы считывать содержимое файла и проверять правильно ли 
//? пользователь ввел логин и пароль, в случае правильного ввода вывести логин на экран и так же создать новый файл или перезаписать 
//? значение в существующем, используя логин в качестве имени файла, в этот файл заносить число правильных попыток входа для данного пользователя.

// receiving data from the form
$login = $_POST['login'];
$pwd = $_POST['pwd'];

$login = trim($login);
$login = stripslashes($login);
$login = strip_tags($login);
$login = htmlspecialchars($login);

$pwd = trim($pwd);
$pwd = stripslashes($pwd);
$pwd = strip_tags($pwd);
$pwd = htmlspecialchars($pwd);


if ((!empty($login)) && (!empty($pwd))) {
    echo "Request submitted <br>";
} else {
    echo "Error! Fields are mandatory and can't be empty! <br>";
}

echo "login: " . $login . "password: " . $pwd . "<br>";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PHP files</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_page">
        <h1>PHP files homework </h1>
        <form method="POST" action="index.php">
            <ul class="wrapper">
                <li class="form-row">
                    <label for="fname">Enter your login:</label>
                    <input type="text" name="login" placeholder="login" required>
                </li>
                <li class="form-row">
                    <label for="pwd">Enter a Password:</label>
                    <input type="password" name="pwd" placeholder="password" required>
                </li>
                <li class="form-row">
                    <input type="submit" value="Send Request">
                </li>
            </ul>
        </form>
    </div>
</body>

</html>