<?php

namespace App\Project\Models\Services;

use App\Project\Models\DAO\UserDAO;
use App\Project\Models\User;
use App\Project\Utils\Hasher;
use App\Project\Utils\IdGenerator;

class UserService
{
    private $userDAO;
    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function registerUser($form)
    {
        $user = new User(
            IdGenerator::generateId(),
            $form['username'],
            $form['email'],
            Hasher::getHash($form['password'])
        );
        $this->userDAO->create($user);
        $this->setUserInSession($user->getId(), $user->getUsername());
    }

    public function loginUser($form)
    {
        $userData = $this->userDAO->getRegisteredUser($form['email']);
        $this->setUserInSession($userData['user_id'], $userData['username']);
    }

    public function logoutUser()
    {
        session_destroy();
    }

    private function setUserInSession($id, $username)
    {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
    }
}
