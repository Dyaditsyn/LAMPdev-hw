<?php


class Admin extends User
{

    protected const TYPE = 'admin';

    public function __construct(string $name, string $email, string $password, int $id = null)
    {
        parent::__construct($name, $email, $password, $id);
        $this->name = "Admin " . $name;
    }

    public function register(object $db, $type = self::TYPE): int
    {
        return parent::register($db, $type);
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
}
