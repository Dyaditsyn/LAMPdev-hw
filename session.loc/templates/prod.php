<?php
function prod($product)
{ ?>
    <li class="form-row">
        <label for="<?php echo $product['name']; ?>">
            <input type="checkbox" name="products[]" value="<?php echo $product['name']; ?>" />
            <?php echo $product['name'] . " $" . $product['price'] . " qty: " . $product['qty']; ?>
        </label>
    </li>
<?php } ?>