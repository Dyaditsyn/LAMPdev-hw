<?php


class Cart
{
    private $id;
    private $userId;
    private $products;

    public function __construct(
        int $id,
        int $userId,
        array $products = []
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->products = $products;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function geUserId(): int
    {
        return $this->userId;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $products)
    {
        $this->products = $products;
    }

    public function clearCart(): int
    {
        $this->products = [];
        $stmt = Db::getInstance()->prepare(
            "
        DELETE FROM
            `test`.`cart_products` 
        WHERE
            cart_id = :cart_id"
        );
        return $stmt->execute(
            [
                "cart_id" => $this->id,
            ]
        );
    }

    public static function getCartById($id): Cart
    {
        $stmt = Db::getInstance()->prepare("
            SELECT 
                * 
            FROM 
                `test`.`cart`
            WHERE `id` = :id
                ");
        $stmt->execute(
            [
                "id" => $id,
            ]
        );
        $cart = $stmt->fetch();

        $stmt = Db::getInstance()->prepare("
            SELECT
                `products`.*, 
                `cart_products`.`quantity` as selected_qty,
                `cart_products`.`order_date`
            FROM
                `test`.`products`
            INNER JOIN `test`.`cart_products` ON `cart_products`.`product_id` = `products`.`id` 
            WHERE
                `test`.`cart_products`.`cart_id` = :cart_id   
            ");
        $stmt->execute(
            [
                "cart_id" => $id,
            ]
        );
        $products = $stmt->fetchAll();
        $cartProducts = [];
        foreach ($products as $product) {
            $cartProducts[] = new CartProduct(
                $product['id'],
                $product['price'],
                $product['quantity'],
                $product['category_id'],
                $product['name'],
                $product['selected_qty'],
                $product['order_date'],
                $product['image'],
            );
        }
        return new Cart($cart['id'], $cart['user_id'], $cartProducts);
    }

    public static function create(int $userId): Cart
    {
        $stmt = Db::getInstance()->prepare("
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
        $cartId = Db::getInstance()->lastInsertId();
        return new Cart($cartId, $userId);
    }

    public function calcTotalProductPrice(): float
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPrice() * $product->getSelectQuantity();
        }
        return $sum;
    }
}
