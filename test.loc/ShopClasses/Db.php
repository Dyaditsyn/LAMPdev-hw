<?php

namespace ShopClasses;

class Db // SIngleton class
{
    private static $_instance;

    private function __construct()
    {
        self::$_instance = new \PDO(
            'mysql:host=localhost;dbname' . $_ENV['DB_NAME'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD'],
            [
                \PDO::ATTR_ERRMODE                           => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC

            ]
        );
    }

    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            new self();
        }
        return self::$_instance;
    }
}
