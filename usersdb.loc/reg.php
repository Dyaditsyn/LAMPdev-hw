<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "config.php";
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "partials" . DIRECTORY_SEPARATOR . "header.php";
?>

<div class="main_page">
    <form method="POST" action="request.php">
        <ul class="wrapper">
            <h3>Create new account</h3>
            <li class="form-row">
                <label for="name">Enter your name:</label>
                <input type="text" name="name" id="name" placeholder="name" required />
            </li>
            <li class="form-row">
                <label for="login">Enter your login:</label>
                <input type="text" name="login" id="login" placeholder="login" required />
            </li>
            <li class="form-row">
                <label for="password">Enter a Password:</label>
                <input type="password" name="password" id="password" placeholder="password" required />
            </li>
            <li class="form-row">
                <label for="repass">Re-Enter a Password:</label>
                <input type="password" name="repass" id="repass" placeholder="password" required />
            </li>
            <li class="form-row">
                <label for="email">Enter an Email:</label>
                <input type="email" name="email" id="email" placeholder="email" required />
            </li>
            <li class="form-row">
                <input type="submit" name="submit" value="Sign up" />
            </li>
        </ul>
    </form>
    <p>Already registered? <a href="index.php">Sign in</a></p>
</div>

<?php
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "partials" . DIRECTORY_SEPARATOR . "footer.php";
?>