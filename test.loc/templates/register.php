<?php
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "partials" . DIRECTORY_SEPARATOR . "header.php";
?>

<main role="main">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <form method="POST" action="/shop/register.php">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="name" class="form-control <?php echo (!empty($error['name']) ? 'is-invalid' : ' ') ?>" placeholder="Full name" type="text" value="<?php echo htmlspecialchars(($_POST['name']) ?? '') ?>">
                    <div class="invalid-feedback">
                        <?php echo ($error['name'] ?? ' ')  ?>
                    </div>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control <?php echo (!empty($error['email'])  ? 'is-invalid' : ' ') ?>" placeholder="Email address" type="email" value="<?php echo htmlspecialchars(($_POST['email']) ?? '') ?>">
                    <div class="invalid-feedback">
                        <?php echo ($error['email'] ?? ' ')  ?>
                    </div>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password" class="form-control <?php echo (!empty($error['password'])  ? 'is-invalid' :  ' ') ?>" placeholder="Create password" type="password">
                    <div class="invalid-feedback">
                        <?php echo ($error['password'] ?? ' ')  ?>
                    </div>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="confirm_password" class="form-control <?php echo (!empty($error['confirm_password'])  ? 'is-invalid' :  ' ') ?>" placeholder="Repeat password" type="password">
                    <div class="invalid-feedback">
                        <?php echo ($error['confirm_password'] ?? ' ')  ?>
                    </div>
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Create Account </button>
                </div> <!-- form-group// -->
                <p class="text-center">Have an account? <a href="/shop/login.php">Log In</a> </p>
            </form>
        </article>
    </div> <!-- card.// -->
</main>


<?php
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "partials" . DIRECTORY_SEPARATOR . "footer.php";
?>