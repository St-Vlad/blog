<?php

namespace App\Project\Models;

use App\Project\Utils\Hasher;
use App\Project\Utils\IdGenerator;

class User
{
    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password)
    {
        $this->id = IdGenerator::generateId();
        $this->username = $username;
        $this->email = $email;
        $this->password = Hasher::getHash($password);
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