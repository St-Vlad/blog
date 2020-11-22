<?php

namespace App\Project\Controllers;
use App\Project\Models\RegistrationFormValidator;
use App\Project\Models\UserService;
use App\Project\Utils\FormCleaner;

class RegistrationController extends BaseController
{
    private $userService;
    private $errors;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function actionRegister()
    {
        if (isset($_POST['submit']))
        {

            $registerForm = new RegistrationFormValidator();
            $form = FormCleaner::purify($_POST);

            $registerForm->load($form);
            if (!$registerForm->isValid()) {
                $this->errors = $registerForm->getErrors();
            }
            else{
                $this->userService->registerUser($form);
                header("Location: /");
            }
        }
        return $this->render('user/registration', ['errors' => $this->errors]);
    }
}