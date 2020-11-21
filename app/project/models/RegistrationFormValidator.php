<?php

namespace App\Project\Models;

class RegistrationFormValidator extends FormModel
{
    use ValidationUserRules;

    private $data;

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
        $this->checkPasswordLength($this->data['password']);
        $this->checkPasswordSameness($this->data['password'],
                                     $this->data['repeat-password']);
        $this->checkEmailExistence($this->data['email']);
        var_dump($this->data);
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
        $existingEmail = (new userDAO)->getExistingEmail($email);
        if ($email === $existingEmail['email'])
        {
            $this->addError("emailExist", "Такий Email вже існує");
        }
    }
}