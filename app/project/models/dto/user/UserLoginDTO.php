<?php

namespace App\Project\Models\DTO\User;

class UserLoginDTO
{
    private $user_id;
    private $username;

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getUsername()
    {
        return $this->username;
    }
}
