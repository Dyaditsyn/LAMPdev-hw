<?php


interface ChangePassword
{
    public function changePassword(string $oldPassword, string $newPassword): bool;
}
