<?php

namespace App\Project\Models\DTO\User;

use App\Project\Utils\Hasher;
use App\Project\Utils\IdGenerator;

class UserRegisterDTO
{
    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct(array $form)
    {
        $this->id = IdGenerator::generateId();
        $this->username = $form['username'];
        $this->email = $form['email'];
        $this->password = Hasher::getHash($form['password']);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
