<?php


class Product
{
    protected $id;
    protected $price;
    protected $quantity;
    protected $categoryId;
    protected $name;
    protected $image;
    protected $properties = ["id", "price", "quantity", "categoryId", "name", "image"];

    public function __construct(
        int $id,
        float $price,
        int $quantity,
        int $categoryId,
        string $name,
        string $image = null
    ) {
        $this->id = $id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->categoryId = $categoryId;
        $this->name = $name;
        if (!empty($image)) {
            $this->image = $image;
        }
    }

    public function __call($name, $arguments)
    {
        if (strpos($name, "get") === 0) { // проверяем или имя функции начинается с ГЕТ
            $param = strtolower(explode("get", $name)[1]); // если да берем все кроме ГЕТ и приводим к нижнему регистру
            if (in_array($param, $this->properties)) { // проверяем или полученное свойство есть в массиве свойств
                return $this->{$param};
            }
        }

        if (strpos($name, "set") === 0) { // проверяем или имя функции начинается с ГЕТ
            $param = strtolower(explode("set", $name)[1]); // если да берем все кроме ГЕТ и приводим к нижнему регистру
            if (in_array($param, $this->properties)) { // проверяем или полученное свойство есть в массиве свойств
                $this->{$param} = $arguments[0];
            }
        }
    }

    public static function getAll(object $db): array
    {
        $products = [];
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $stmt = $db->query("SELECT * FROM `test`.`products`");
        $productsArr = $stmt->fetchAll();
        foreach ($productsArr as $product) {
            $products[] = new Product(
                $product['id'],
                $product['price'],
                $product['quantity'],
                $product['category_id'],
                $product['name'],
                $product['image']
            );
        }
        return $products;
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

    // public function setCategoryId(int $categoryId): void
    // {
    //     $this->categoryId = $categoryId;
    // }

    // public function setName(int $name): void
    // {
    //     $this->name = $name;
    // }

    // public function setPrice(int $price): void
    // {
    //     $this->price = $price;
    // }

    // public function setQuantity(int $quantity): void
    // {
    //     $this->quantity = $quantity;
    // }

    // public function getQuantity(): int
    // {
    //     return $this->quantity;
    // }

    // public function getName()
    // {
    //     return $this->name;
    // }

    // public function getCategoryId()
    // {
    //     return $this->categoryId;
    // }

    // public function getPrice()
    // {
    //     return $this->price;
    // }


}
