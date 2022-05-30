<?php

namespace Shop;

abstract class AbstractUser
{
    public $id;
    public $name;
    public $email;
    protected $password;
    private $properties = ["id", "name", "email"];

    abstract public function setPassword(string $password);

    abstract public function getPassword(): string;

    abstract public function changePassword(string $oldPassword, string $newPassword);
}
