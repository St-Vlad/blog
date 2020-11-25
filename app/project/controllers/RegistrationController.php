<?php

namespace App\Project\Controllers;
use App\Project\Models\Forms\RegistrationForm;
use App\Project\Models\Services\UserService;
use App\Project\Utils\FormCleaner;

class RegistrationController extends BaseController
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
}
