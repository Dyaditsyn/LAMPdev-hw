<?php


class Admin extends User implements ChangePassword, Block
{

    protected const TYPE = 'admin';

    public function __construct(int $id, string $name, string $email, string $password)
    {
        parent::__construct($id, $name, $email, $password);
        $this->name = "Admin " . $name;
    }

    public static function register(object $db, string $name, string $email, string $password, $type = self::TYPE): User
    {
        return parent::register($db, $name, $email, $password, $type);
    }

    public function block(User $user, object $db): void
    {
        // if ($user::TYPE != User::TYPE) {
        //     return;
        // }
        if ($user instanceof Admin) {
            return;
        }
        $stmt = $db->prepare(
            "
        UPDATE `test`.`users`
        SET `status` = :status
        WHERE `user_id` = :id"
        );
        $stmt->execute(
            [
                "status" => 'not active',
                "id" => $user->id,
            ]
        );
        $user->changeStatus('not active');
    }

    protected function delete(): void
    {
    }
}
