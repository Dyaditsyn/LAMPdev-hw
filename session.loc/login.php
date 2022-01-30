<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PHP session</title>
    <link type="text/css" rel="stylesheet" href="css/styles.css">
</head>

<body>

    <?php if (!empty($_GET['error'])) : ?>
        <h3>No products selected</h3>
    <?php endif; ?>

    <div class="main_page">
        <h1>PHP session homework </h1>
        <form method="POST" action="index.php">
            <ul class="wrapper">
                <h2>Please select your products</h2>

                <?php
                require dirname(__FILE__) . DIRECTORY_SEPARATOR . "functions.php";
                $products = json_to_arr();
                foreach ($products as $product) { ?>

                    <li class="form-row">
                        <label>
                            <input type="checkbox" name="products[]" value="<?php echo $product['name']; ?>" />
                            <?php echo $product['name'] . " $" . $product['price'] . " qty: " . $product['qty']; ?>
                        </label>
                    </li>

                <?php } ?>

                <li class=" form-row">
                    <input type="submit" name="submit" value="Add to basket">
                </li>
            </ul>
        </form>
    </div>
</body>

</html>