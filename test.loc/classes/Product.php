<?php


class Product
{
    public $id;
    public $categoryId;
    public $name;
    public $quantity;
    public $price;
    public $image;

    public function __construct(string $categoryId, string $name, string $price, int $quantity, int $id = null)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    public function setName(int $name): void
    {
        $this->name = $name;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function getPrice()
    {
        return $this->price;
    }

    function addProduct(object $connection, string $name, float $price, int $quantity, int $categoryId): int
    {
        $stmt = $connection->prepare(
            "
    INSERT INTO `test`.`products` ( 
        `price`, 
        `quantity`, 
        `category_id`, 
        `name` 
    )
    VALUES
        (
            :price,
            :quantity,
            :category_id,
            :name
        )"
        );
        return $stmt->execute(
            [
                "price" => $price,
                "quantity" =>  $quantity,
                "category_id" =>  $categoryId,
                "name" =>  $name
            ]
        );
    }

    public function getAllProducts(object $connection, int $page, int $perPage = 2): array
    {
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $stmt = $connection->query("SELECT * FROM test.products LIMIT " . $perPage . " OFFSET " . ($page - 1) * $perPage);
        return $stmt->fetchAll();
    }
}
