<?php

namespace App\Project\Models\Forms;

use App\Project\Models\DAO\ValidationDAO;
use App\Project\Utils\CSRFGenerator;

class RegistrationForm extends FormModel
{
    use ValidationUserMethods;

    private $data;
    private $token;

    private $fields = [
        'username' => 'Ім\'я корисувача',
        'email' => 'Електронна адреса',
        'password' => 'Пароль',
        'repeat-password' => 'Повтор паролю',
    ];

    public function load($data)
    {
        if (isset($data)) {
            $this->data = $data;
        }
    }

    public function isValid()
    {
        $this->checkNotEmpty($this->data);
        $this->checkUsernameLength($this->data['username']);
        $this->checkEmailMask($this->data['email']);
        $this->checkEmailExistence($this->data['email']);
        $this->checkPasswordLength($this->data['password']);
        $this->checkPasswordSameness(
            $this->data['password'],
            $this->data['repeat-password']
        );

        if (!empty($this->errors)) {
            return false;
        }
        return true;
    }

    private function checkPasswordSameness($password, $repeatPassword)
    {
        if ($password !== $repeatPassword) {
            $this->addError("differentPasswords",
                "Паролі повинні співпадати");
        }
    }

    private function checkEmailExistence($email)
    {
        if (!empty($email)) {
            $existingEmail = (new ValidationDAO())->getExistingEmail($email);
            if (!empty($existingEmail)) {
                if ($email === $existingEmail['email']) {
                    $this->addError(
                        "emailExist",
                        "Така електронна пошта вже зареєстрована"
                    );
                }
            }
        }
    }
}
