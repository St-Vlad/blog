<?php

namespace App\Project\Models;

use App\Project\Utils\FormCleaner;

class UserService
{
    private $userDAO;
    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function registerUser($form)
    {
        $user = new User($form['username'],
                $form['email'],
                $form['password']);
        $this->userDAO->create($user);
        $_SESSION['user_id'] = $user->getId();
        header("Location: /");
    }

    public function loginUser( )
    {

    }

    public function logoutUser()
    {

    }
}