<?php

namespace App\Project\Controllers;

use App\Project\Models\LoginFormValidator;
use App\Project\Models\UserService;
use App\Project\Utils\FormCleaner;

class LoginController extends BaseController
{
    private $loginForm;
    private $userService;
    private $errors;

    public function __construct()
    {
        $this->loginForm = new LoginFormValidator();
        $this->userService = new UserService();
    }

    public function actionLogin()
    {
        if (isset($_POST['submit']))
        {
            $form = FormCleaner::purify($_POST);
            $this->loginForm->load($form);
            if (!$this->loginForm->isValid()) {
                $this->errors = $this->loginForm->getErrors();
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
