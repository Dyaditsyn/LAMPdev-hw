<?php

namespace ShopClasses;

use ShopClasses\Interfaces\ChangePassword;

class User extends AbstractUser implements ChangePassword
{
    private $cardnumber;
    private $status = 'active';
    protected const TYPE = 'user';
    private $properties = ["id", "name", "email"];
    private const SALT = 'ccfo58d3311s$';

    public function __construct(int $id, string $name, string $email, string $password = null)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
        $this->name = $name;
        $this->email = $email;
        if (isset($password)) {
            $this->setPassword($password);
        }
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function setPassword(string $password)
    {
        $this->password = self::encryptPass($password);
    }

    private static function encryptPass(string $password): string
    {
        return  sha1($password . self::SALT);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function changePassword(string $oldPassword, string $newPassword): bool
    {
        if (self::encryptPass($oldPassword) === $this->password) {
            $this->password = self::encryptPass($newPassword);
            // sending email
            // self::sendEmail();
            return true;
        }
        return false;
    }

    public static function login(string $email, string $password): array
    {
        $stmt = Db::getInstance()->prepare(
            "
            SELECT 
                *
            FROM
                `test`.`users` 
            WHERE
                `email` = :email 
                AND `password` = :password"
        );
        $stmt->execute(
            [
                "email" => $email,
                "password" => self::encryptPass($password),
            ]
        );
        $user = $stmt->fetch();
        return (!empty($user) ? $user : []);
    }

    public static function register(string $name, string $email, string $password, $type = self::TYPE): User
    {
        $stmt = Db::getInstance()->prepare(
            "
        INSERT INTO `test`.`users` (
            `user_name`,
            `email`,
            `password`,
            `type`
            )
            VALUES
            (
                :name,
                :email,
                :password,
                :type
        )"
        );
        $stmt->execute(
            [
                "name" => $name,
                "email" => $email,
                "password" => self::encryptPass($password),
                "type" => $type,
            ]
        );
        $id = Db::getInstance()->lastInsertId();
        return new User($id, $name, $email, $password);
    }

    public function __call($name, $arguments)
    {
        // Замечание: значение $name регистрозависимо.
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

    public function __get(string $name): string
    {
        if ($name == 'password') {
            return $this->getPassword();
        } elseif ($name == 'cardnumber') {
            return '***' . substr($this->{$name}, -3);
        }
    }

    public function __set(string $name, string $value): void
    {
        if ($name == 'password') {
            $this->setPassword($value);
        }
        $this->$name = $value;
    }

    public function __sleep(): array
    {
        return ["name",  "email"];
    }

    public function __toString(): string
    {
        return $this->name . " " . $this->email;
    }

    protected function changeStatus(string $status): void
    {
        $this->status = $status;
    }

    public static function getUserByEmail(string $email)
    {
        $stmt = Db::getInstance()->prepare(
            "
            SELECT 
                *
            FROM
                `test`.`users` 
            WHERE
                `email` = :email"
        );
        $stmt->execute(
            [
                "email" => $email,
            ]
        );
        $res = $stmt->fetch();
        if (empty($res)) {
            return false;
        }
        $user = new User($res['user_id'], $res['user_name'], $res['email']);
        $user->password = $res['password'];
        return $user;
    }
}
