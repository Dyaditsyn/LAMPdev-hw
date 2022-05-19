<?php


class User
{
    public $id;
    public $name;
    public $email;
    protected $password;
    private $salt = 'ccfo58d3311s$';
    private $cardnumber;
    private $status = 'active';
    protected const TYPE = 'user';
    private $properties = ["id", "name", "email"];

    public function __construct(string $name, string $email, string $password, int $id = null)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
        $this->name = $name;
        $this->email = $email;
        $this->setPassword($password);
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo "Object is removed";
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

    public function register(object $db, $type = self::TYPE): int
    {
        $stmt = $db->prepare(
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
                "name" => $this->name,
                "email" => $this->email,
                "password" => $this->password,
                "type" => $type,
            ]
        );
        $this->id = $db->lastInsertId();
        return $this->id;
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
}
