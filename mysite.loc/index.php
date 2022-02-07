<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "header.php";
require ROOT_PATH . DIRECTORY_SEPARATOR . "functions.php";
$products = json_to_arr(ROOT_PATH . DIRECTORY_SEPARATOR . "products.json");
?>

<?php if (!empty($_GET['error'])) : ?>
    <h3>Login or password incorrect</h3>
<?php endif; ?>

<div class="main_page">
    <h1>PHP API Homework </h1>
    <form method="POST" action="request.php">
        <ul class="wrapper">
            <h3>Please log in to the system</h3>
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
                <input type="submit" name="submit" value="Sign in" />
            </li>
        </ul>
    </form>
    <p>Don't have an account? <a href="reg.php">Sign up</a></p>
</div>

<?php
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "footer.php";
?>