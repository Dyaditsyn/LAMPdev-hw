<?php
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "partials" . DIRECTORY_SEPARATOR . "header.php";
?>


<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1>Best shop</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
            <p>
                <a href="#" class="btn btn-primary my-2">All products</a>
                <a href="/shop/cart.php" class="btn btn-secondary my-2">Shopping cart</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <form method="post" action="/shop/index.php">
                <div class="row">
                    <?php foreach ($products as $product) : ?>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <?php if (!empty($product->getImage())) : ?>
                                    <img class="img-fluid product-img" src="<?php echo $product->getImage(); ?> ">
                                <?php else : ?>
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $product->getName(); ?></text>
                                    </svg>
                                <?php endif; ?>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $product->getName() . " (" . $product->getQuantity() . ")"; ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        BUY?<input type="checkbox" name="products[]" value="<?php echo $product->getId(); ?>" />
                                        <input type="number" id="quantity" name="quantity_<?php echo $product->getId(); ?>" min="1" max="<?php echo $product->getQuantity(); ?>">
                                        <small class="text-muted">$<?php echo number_format($product->getPrice(), 2, '.', ','); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <input type="submit" class="btn btn-success" value="Order" />
            </form>
        </div>
    </div>

</main>

<?php
require_once ROOT_PATH . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "partials" . DIRECTORY_SEPARATOR . "footer.php";
?>