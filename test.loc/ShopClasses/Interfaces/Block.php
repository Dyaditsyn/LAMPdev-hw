<?php

namespace ShopClasses\Interfaces;

use ShopClasses\User;

interface Block
{
    public function block(User $user): void;
}
