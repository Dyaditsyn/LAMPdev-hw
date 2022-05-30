<?php

namespace Shop\Interfaces;

use Shop\User;

interface Block
{
    public function block(User $user): void;
}
