<?php


class User
{
    public $id;
    public $name;
    public $email;
    private $password;
    private $salt = 'ccfo58d3311s$';

    public function __construct(string $name, string $email, string $password, int $id = null)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
        $this->name = $name;
        $this->email = $email;
        $this->setPassword($password);
    }

    public function setPassword(string $password)
    {
        $this->password = $this->encryptPass($password);
    }

    private function encryptPass(string $password): string
    {
        return  sha1($password . $this->salt);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function changePassword(string $oldPassword, string $newPassword): bool
    {
        if ($this->encryptPass($oldPassword) === $this->password) {
            $this->password = $this->encryptPass($newPassword);
            return true;
        }
        return false;
    }

    public function login(string $email, string $password): int
    {
        if ($email === $this->email && $this->encryptPass($password) === $this->password) {
            return $this->id;
        }
        return 0;
    }

    public function register($db): int
    {
        $stmt = $db->prepare(
            "
        INSERT INTO `test`.`users` (
            `user_name`,
            `email`,
            `password`
            )
            VALUES
            (
                :name,
                :email,
                :password
        )"
        );
        $stmt->execute(
            [
                "name" => $this->name,
                "email" => $this->email,
                "password" => $this->password
            ]
        );
        $this->id = $db->lastInsertId();
        return $this->id;
    }
}
