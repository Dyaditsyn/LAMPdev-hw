<?php

namespace Shop;

class CartProduct extends Product
{
    private $orderDate;
    private $selectQuantity;

    public function __construct(
        int $id,
        float $price,
        int $quantity,
        int $categoryId,
        string $name,
        int $selectQuantity,
        string $orderDate,
        string $image = null

    ) {
        parent::__construct($id, $price, $quantity, $categoryId, $name, $image);
        $this->selectQuantity = $selectQuantity;
        $this->orderDate = $orderDate;
    }

    public function getSelectQuantity(): int
    {
        return $this->selectQuantity;
    }

    public function getOrderDate(): string
    {
        return $this->orderDate;
    }

    public static function create(int $cartId, int $productId,  int $quantity): CartProduct
    {
        $orderDate = date("Y-m-d");
        $stmt = Db::getInstance()->prepare(
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
            :order_date
        )"
        );
        $stmt->execute(
            [
                "cart_id" => $cartId,
                "product_id" => $productId,
                "quantity" => $quantity,
                "order_date" => $orderDate,
            ]
        );
        $product = parent::getById($productId);
        return new CartProduct(
            $product->id,
            $product->price,
            $product->quantity,
            $product->categoryId,
            $product->name,
            $quantity,
            $orderDate,
            $product->image
        );
    }
}
