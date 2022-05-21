<?php


class Cart
{
    public $cartId;
    public $userId;
    public $productId;
    public $quantity;
    public $orderDate;

    public function __construct(int $userId, int $cartId = null)
    {
        if (!empty($cartId)) {
            $this->cartId = $cartId;
        }
        $this->userId = $userId;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getOrderDate()
    {
        return $this->orderDate;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function getUsertId()
    {
        return $this->userId;
    }

    public function addProductToCart(object $connection, int $cartId, int $productId,  int $quantity = 1): int
    {
        $stmt = $connection->prepare(
            "
    INSERT INTO `test`.`cart_products` (
        `cart_id`,
        `product_id`,
        `quantity`,
        `order_date`
    )
    VALUES
        (
            :cart_id,
            :product_id,
            :quantity,
            DATE(NOW())
        )"
        );
        return $stmt->execute(
            [
                "cart_id" => $cartId,
                "product_id" => $productId,
                "quantity" => $quantity
            ]
        );
    }

    function createCart(object $connection, int $userId): int
    {
        $stmt = $connection->prepare("
        INSERT INTO `test`.`cart` ( 
            `user_id`
        )
        VALUES
            (
                :user_id
            )
        ");
        $stmt->execute(
            [
                "user_id" => $userId,
            ]
        );
        return $connection->lastInsertId();
    }

    public function clearCart(object $connection, int $cartId): int
    {
        $stmt = $connection->prepare(
            "
        DELETE FROM
            `test`.`cart_products` 
        WHERE
            cart_id = :cart_id"
        );
        return $stmt->execute(
            [
                "cart_id" => $cartId,
            ]
        );
    }

    public function getCartProducts(object $connection, int $cartId, int $page, int $perPage = 10)
    {
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $stmt = $connection->prepare("
        SELECT
            products.*, cart_products.quantity as selected_qty
        FROM
            test.products
        INNER JOIN test.cart_products ON cart_products.product_id = products.id 
        WHERE
            test.cart_products.cart_id = :cart_id   
        LIMIT " . $perPage . " OFFSET " . ($page - 1) * $perPage);
        $stmt->execute(
            [
                "cart_id" => $cartId,
            ]
        );
        return $stmt->fetchAll();
    }

    public function calcTotalProductPrice(object $connection, int $cartId)
    {
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_COLUMN);
        $stmt = $connection->prepare(
            "
        SELECT
            sum(products.price * cart_products.quantity)
        FROM
            test.products
        INNER JOIN test.cart_products ON cart_products.product_id = products.id 
        WHERE
            test.cart_products.cart_id = :cart_id"
        );
        $stmt->execute(
            [
                "cart_id" => $cartId,
            ]
        );
        return $stmt->fetch();
    }
}
