<?php

namespace Shop\Lib;

use \Shop\Db;

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

    public static function getAll(): array
    {
        $products = [];
        $stmt = Db::getInstance()->query("SELECT * FROM `test`.`products`");
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

    public static function getById(int $id): Product
    {
        $stmt = Db::getInstance()->prepare("
    SELECT
	    * 
    FROM
	    `test`.`products` 
    WHERE
	    `id` = :id
        ");
        $stmt->execute(
            [
                "id" => $id
            ]
        );
        $product = $stmt->fetch();
        return new Product(
            $id,
            $product['price'],
            $product['quantity'],
            $product['category_id'],
            $product['name'],
            $product['image']
        );
    }
}
