<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "header.php";
require ROOT_PATH . DIRECTORY_SEPARATOR . "functions.php";
$products = json_to_arr(ROOT_PATH . DIRECTORY_SEPARATOR . "products.json");
?>

<?php if (!empty($_GET['error'])) : ?>
    <h3>No products selected</h3>
<?php endif; ?>

<div class="main_page">
    <h1>PHP API Homework </h1>
    <form method="POST" action="request.php">
        <ul class="wrapper">
            <h3>Create new account</h3>
            <li class="form-row">
                <label for="login">Enter your login:</label>
                <input type="text" name="login" id="login" placeholder="login" required />
            </li>
            <li class="form-row">
                <label for="password">Enter a Password:</label>
                <input type="password" name="password" id="password" placeholder="password" required />
            </li>
            <li class="form-row">
                <label for="re-password">Re-Enter a Password:</label>
                <input type="password" name="re-password" id="re-password" placeholder="password" required />
            </li>
            <li class="form-row">
                <label for="email">Enter an Email:</label>
                <input type="email" name="email" id="email" placeholder="email" required />
            </li>
            <li class="check">
                <label for="remember">Remember me</label>
                <input type="checkbox" name="remember" id="remember" />
            </li>
            <li class="form-row">
                <input type="submit" name="submit" value="Sign up" />
            </li>
        </ul>
    </form>
</div>

<?php
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "footer.php";
?>