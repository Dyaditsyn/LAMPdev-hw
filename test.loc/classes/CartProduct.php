<?php


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

    // public function setSelectQuantity(): int
    // {
    //     $this->selectQuantity;
    // }

    // public function setOrderDate(): string
    // {
    //     $this->orderDate;
    // }
}
