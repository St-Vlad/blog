<?php

namespace App\Project\Models\Services;

use App\Project\Models\DAO\UserDAO;
use App\Project\Models\DTO\User\UserRegisterDTO;

class UserService
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function registerUser(UserRegisterDTO $user)
    {
        $this->userDAO->create($user);
        $this->setUserInSession($user->getId(), $user->getUsername());
    }

    public function loginUser($form)
    {
        $user = $this->userDAO->getRegisteredUser($form['email']);
        $this->setUserInSession($user->getUserId(), $user->getUsername());
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
