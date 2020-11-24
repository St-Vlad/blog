<?php

namespace App\Project\Controllers;

use App\Project\Models\LoginFormValidator;
use App\Project\Models\UserService;
use App\Project\Utils\FormCleaner;

class LoginController extends BaseController
{
    private $userService;
    private $errors;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function actionLogin()
    {
        $loginForm = new LoginFormValidator();
        if (isset($_POST['submit']))
        {
            $form = FormCleaner::purify($_POST);
            $loginForm->load($form);
            if (!$loginForm->isValid()) {
                $this->errors = $loginForm->getErrors();
            }
            else{
                $this->userService->loginUser($form);
                header("Location: /");
            }
        }
        return $this->render('user/login', ['errors' => $this->errors]);
    }

    public function actionLogout()
    {
        $this->userService->logoutUser();
        header("Location: /");
    }
}
