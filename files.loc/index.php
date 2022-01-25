<?php
//? Создать текстовый файл в любом редакторе, каждая строка которого содержит логин и пароль пользователя, отделенных пробелом в виде
//? login pass
//? login1 123456
//? затем создать форму ввода логина и пароля на html, при сабмите формы считывать содержимое файла и проверять правильно ли 
//? пользователь ввел логин и пароль, в случае правильного ввода вывести логин на экран и так же создать новый файл или перезаписать 
//? значение в существующем, используя логин в качестве имени файла, в этот файл заносить число правильных попыток входа для данного пользователя.

$login = '';
$pwd = '';
$count = 0;
define("ROOT_PATH", dirname(__FILE__));

if ((!empty($_POST['login'])) && (!empty($_POST['pwd']))) {
    echo "Request submitted <br>";
    $login = htmlspecialchars(strip_tags(stripslashes(trim($_POST['login']))));
    $pwd = htmlspecialchars(strip_tags(stripslashes(trim($_POST['pwd']))));

    if (strlen($login) > 0 || strlen($pwd) > 0) {
        $userFile = fopen(ROOT_PATH . DIRECTORY_SEPARATOR . "users.txt", "r");
        if (!$userFile) {
            echo "Eror file opening";
            die();
        }

        do {
            $tempStrArr = explode(" ", fgets($userFile));
            $currentLogin = trim($tempStrArr[0]);
            $currentPwd = trim($tempStrArr[1]);
            if (($currentLogin === $login) && ($currentPwd === $pwd)) {
                echo "Hello, user $currentLogin!<br>";
                if (file_exists(ROOT_PATH . DIRECTORY_SEPARATOR . "$login.txt")) {
                    $count = (int) file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "$login.txt", "r+");
                    file_put_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "$login.txt", "");
                }
                file_put_contents(ROOT_PATH . DIRECTORY_SEPARATOR . "$login.txt", ++$count);
                break;
            } elseif ($currentLogin === $login) {
                echo "User '$login' please re-check you password anr try again<br>";
                break;
            }
        } while ((!feof($userFile)) || ($currentLogin === $login));

        if (($currentLogin !== $login) && ($currentPwd !== $pwd)) {
            echo "No such user '$login' in database. Please re-check your input<br>";
        }

        fclose($userFile);
    } else {
        echo "Invalid input! No empty fileds allowed<br>";
    }
}
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