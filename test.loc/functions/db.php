<?php

function getCategoryIdByName(object $connection, string $name): string
{
    $stmt = $connection->prepare("
    SELECT
	    `id` 
    FROM
	    `test`.`categories` 
    WHERE
	    `name` = :name
        ");
    $stmt->execute(["name" => $name]);
    return $stmt->fetch();
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

function getAllProducts(object $connection, int $page, int $perPage = 2): array
{
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $stmt = $connection->query("SELECT * FROM test.products LIMIT " . $perPage . " OFFSET " . ($page - 1) * $perPage);
    return $stmt->fetchAll();
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

function addProductToCart(object $connection, int $cartId, int $productId, int $quantity = 1): int
{
}
