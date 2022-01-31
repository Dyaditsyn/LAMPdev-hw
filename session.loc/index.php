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
    <h1>PHP session homework </h1>
    <form method="POST" action="store.php">
        <ul class="wrapper">
            <h2>Please select your products</h2>

            <?php
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

<?php
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "footer.php";
?>