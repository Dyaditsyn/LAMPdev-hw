<?php


interface Block
{
    public function block(User $user, object $db): void;
}
