<?php

namespace App\Project\Controllers;

use App\Project\Models\Forms\LoginForm;
use App\Project\Models\Forms\RegistrationForm;
use App\Project\Models\Services\UserService;
use App\Project\Utils\FormCleaner;

class UserController extends BaseController
{
    private $userService;
    private $errors;

    public function __construct()
    {
        $this->userService = new UserService();
        if (isset($_SESSION['user_id'])) {
            header("Location: /");
        }
    }

    public function actionRegister()
    {
        $this->title = 'Реєстрація';

        $registerForm = new RegistrationForm();
        if (isset($_POST['submit'])) {
            $form = FormCleaner::purify($_POST);
            $registerForm->load($form);
            if (!$registerForm->isValid()) {
                $this->errors = $registerForm->getErrors();
            } else {
                $this->userService->registerUser($form);
                header("Location: /");
            }
        }
        return $this->render(
            'user/registration',
            ['errors' => $this->errors]
        );
    }

    public function actionLogin()
    {
        $this->title = "Сторінка логіну";

        $loginForm = new LoginForm();
        if (isset($_POST['submit'])) {
            $form = FormCleaner::purify($_POST);
            $loginForm->load($form);
            if (!$loginForm->isValid()) {
                $this->errors = $loginForm->getErrors();
            } else {
                $this->userService->loginUser($form);
                header("Location: /");
            }
        }
        return $this->render(
            'user/login',
            ['errors' => $this->errors]
        );
    }

    public function actionLogout()
    {
        $this->userService->logoutUser();
        header("Location: /");
    }
}
