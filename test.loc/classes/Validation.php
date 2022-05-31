<?php

namespace Shop;

class Validation
{
    public static function notEmpty(string $field, string $value)
    {
        $val = trim($value);
        if (empty($val)) {
            return  'Field "' . self::breakAndCapField($field) . '" cannot be empty';
        }
    }

    public static function fieldLength(string $field, string $val, int $min = 1, int $max = 255)
    {
        if (strlen($val) < $min) {
            return 'Field "' . self::breakAndCapField($field) . '" must be ' . $min . ' chars at least';
        } elseif (strlen($val) > $max) {
            return 'Field "' . self::breakAndCapField($field) . '" must be up to ' . $max . ' chars long';
        }
    }

    public static function validEmail(string $val)
    {
        if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {;
            return  "Email must be a valid email address";
        }
    }

    public static function checkExist(string $val,  string $column = "email", string $table = "`test`.`users`")
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
                "$column" => $val,
            ]
        );
        $res = $stmt->fetch();
        if (!empty($res)) {
            return  self::breakAndCapField($column) . ' is used';
        }
    }

    public static function confirm(string $field, string $val1, string $val2)
    {
        if ($val1 != $val2) {
            return self::breakAndCapField($field) . " don't match";
        }
    }

    private function breakAndCapField(string $field)
    {
        return ucfirst(str_replace("_", " ", $field));
    }
}
