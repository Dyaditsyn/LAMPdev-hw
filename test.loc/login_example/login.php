<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PHP files</title>
    <link type="text/css" rel="stylesheet" href="css/styles.css">
</head>

<body>

    <?php if (!empty($_GET['error'])) : ?>
        <h3>Login or password invalid</h3>
    <?php endif; ?>

    <div class="main_page">
        <h1>PHP files json example </h1>
        <form method="POST" action="index.php">
            <ul class="wrapper">
                <li class="form-row">
                    <label for="login">Enter your login:</label>
                    <input type="text" name="login" id="login" placeholder="login" required />
                </li>
                <li class="form-row">
                    <label for="password">Enter a Password:</label>
                    <input type="password" name="password" id="password" placeholder="password" required />
                </li>
                <li class="check">
                    <label for="remember">Remember me</label>
                    <input type="checkbox" name="remember" id="remember" />
                </li>
                <li class="form-row">
                    <input type="submit" value="Send Request" />
                </li>
            </ul>
        </form>
    </div>
</body>

</html>