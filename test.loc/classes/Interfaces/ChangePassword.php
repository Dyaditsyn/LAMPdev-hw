<?php

namespace Shop\Interfaces;

interface ChangePassword
{
    public function changePassword(string $oldPassword, string $newPassword): bool;
}
