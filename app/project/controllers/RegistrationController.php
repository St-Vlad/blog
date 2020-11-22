<?php

namespace App\Project\Controllers;
use App\Project\Models\RegistrationFormValidator;
use App\Project\Models\UserService;
use App\Project\Utils\FormCleaner;

class RegistrationController extends BaseController
{
    private $registerForm;
    private $userService;
    private $errors;

    public function __construct()
    {
        $this->registerForm = new RegistrationFormValidator();
        $this->userService = new UserService();
    }

    public function actionRegister()
    {
        if (isset($_POST['submit']))
        {
            $form = FormCleaner::purify($_POST);

            $this->registerForm->load($form);
            if (!$this->registerForm->isValid()) {
                $this->errors = $this->registerForm->getErrors();
            }
            else{
                $this->userService->registerUser($form);
            }
        }
        return $this->render('user/registration', ['errors' => $this->errors]);
    }
}