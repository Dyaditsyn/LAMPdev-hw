<?php

function getUserByLoginAndPass(object $connection, string $login, string $pass): array
{
    $arr = [];
    $stmt = $connection->prepare(
        "
    SELECT
        `id`,
        `name`
    FROM
        `shop`.`users` 
    WHERE
        `login` = :login and `password` = :password
    "
    );

    $stmt->execute(["login" => $login, "password" => $pass]);
    $result = $stmt->fetch();
    return $result ? $result : $arr;
}

function getUserEmail(object $connection, string $email): array
{
    $arr = [];
    $stmt = $connection->prepare(
        "
    SELECT
        `email`
    FROM
        `shop`.`users` 
    WHERE 
        `email` = :email
    "
    );
    $stmt->execute(["email" => $email]);
    $result = $stmt->fetch();
    return $result ? $result : $arr;
}

function addUser(object $connection, string $name, string $login, string $password, string $email): array
{
    $stmt = $connection->prepare(
        "
        INSERT INTO `shop`.`users` ( 
            `name`, 
            `login`, 
            `password`, 
            `email` 
        )
        VALUES
            (
                :name,
                :login,
                :password,
                :email
            )"
    );
    $stmt->execute(
        [
            "name" => $name,
            "login" => $login,
            "password" => $password,
            "email" => $email
        ]
    );
    return $stmt->fetchAll();
}
