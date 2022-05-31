<?php

namespace Shop;

class Validation
{

    private $data;
    private $errors = [];

    public function __construct($postData)
    {
        $this->data = $postData;
    }

    public function validateName(int $min = 1, int $max = 255)
    {
        $val = trim($this->data['name']);
        if (empty($val)) {
            $this->errors["name"] = "Name cannot be empty";
            return $this->errors;
        } elseif (strlen($val) < $min) {
            $this->errors["name"] =  "name must be " . $min . " chars at least";
        } elseif (strlen($val) > $max) {
            $this->errors["name"] = "name must be up to " . $max . " chars long";
        }
        return $this->errors;
    }

    public function validateEmail()
    {

        $val = trim($this->data['email']);

        if (empty($val)) {
            $this->errors["email"] = "Email cannot be empty";
            return $this->errors;
        } elseif (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
            $this->errors["email"] =  "Email must be a valid email address";
            return $this->errors;
        }
    }

    public function checkEmailExist(string $table = "`test`.`users`", string $column = "email")
    {
        $stmt = Db::getInstance()->prepare(
            "
            SELECT 
                *
            FROM
                $table 
            WHERE
                `$column` = :$column"
        );
        $stmt->execute(
            [
                "$column" => $this->data['email'],
            ]
        );
        $res = $stmt->fetch();
        if (!empty($res)) {
            $this->errors["email"] =  "Email is used";
            return $this->errors;
        }
    }

    public function validateNewPassword()
    {
        $pas1 = trim($this->data['password']);
        $pas2 = trim($this->data['confirm_password']);

        if (empty($pas1) || (empty($pas2))) {
            $this->errors["password"] = "Password cannot be empty";
            return $this->errors;
        } elseif ($pas1 != $pas2) {
            $this->errors["confirm_password"] =  "Passwords don't match";
        }
        return $this->errors;
    }

    public function validatePassword()
    {
        $pas1 = trim($this->data['password']);
        if (empty($pas1)) {
            $this->errors["password"] = "Password cannot be empty";
            return $this->errors;
        }
    }
}
