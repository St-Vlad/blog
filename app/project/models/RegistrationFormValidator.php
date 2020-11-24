<?php

namespace App\Project\Models;

use App\Project\Utils\CSRFGenerator;

class RegistrationFormValidator extends FormModel
{
    use ValidationUserMethods;

    private $data;
    private $token;

    public function __construct()
    {
        if (!isset($_SESSION['CSRFtoken'])) {
            $this->token = new CSRFGenerator();
            $_SESSION['CSRFtoken'] = $this->token->getCSRFtoken();
        }
    }

    public function load($data)
    {
        if (isset($data))
        {
            $this->data = $data;
        }
    }

    public function isValid()
    {
        $this->checkNotEmpty($this->data);
        $this->checkEmailMask($this->data['email']);
        $this->checkEmailExistence($this->data['email']);
        $this->checkPasswordLength($this->data['password']);
        $this->checkPasswordSameness($this->data['password'],
                                     $this->data['repeat-password']);

        if (!empty($this->errors))
        {
            return false;
        }
        return true;
    }

    private function checkPasswordSameness($password, $repeatPassword)
    {
        if ($password !== $repeatPassword)
        {
            $this->addError("differentPasswords",
                "Паролі повинні співпадати");
        }
    }

    private function checkEmailExistence($email)
    {
        if (!empty($email))
        {
            $existingEmail = (new userDAO)->getExistingEmail($email);
            if (!empty($existingEmail))
            {
                if ($email === $existingEmail['email'])
                {
                    $this->addError("emailExist", "Така електронна пошта вже зареєстрована");
                }
            }
        }
    }
}