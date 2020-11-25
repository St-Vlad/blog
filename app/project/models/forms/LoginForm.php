<?php

namespace App\Project\Models\Forms;

use App\Project\Models\DAO\ValidationDAO;
use App\Project\Utils\CSRFGenerator;

class LoginForm extends FormModel
{
    use ValidationUserMethods;
    use CSRFChecker;

    private $data;
    private $token;

    private $fields = [
        'email' => 'Ім\'я користувача',
        'password' => 'Пароль',
    ];

    public function __construct()
    {
        if (!isset($_SESSION['CSRFtoken'])) {
            $this->token = new CSRFGenerator();
            $_SESSION['CSRFtoken'] = $this->token->getCSRFtoken();
        }
    }

    public function load($data)
    {
        if (isset($data)) {
            $this->data = $data;
        }
    }

    public function isValid()
    {
        $this->check_csrf($this->data);
        $this->checkNotEmpty($this->data);
        $this->checkUsernameLength($this->data['username']);
        $this->checkEmailMask($this->data['email']);
        $this->checkPasswordLength($this->data['password']);
        $this->checkIsUserRegistered($this->data['email'], $this->data['password']);

        if (!empty($this->errors)) {
            return false;
        }
        return true;
    }

    private function checkIsUserRegistered($email, $password)
    {
        $data = (new ValidationDAO())->checkIsUserRegistered($email);
        if (!$data) {
            $this->addError('userNotExist', "Такого користувача не існує");
        } else {
            if (password_verify($password, $data['password_hash']) && !empty($data['email'])) {
                return true;
            } else {
                $this->addError('wrongLoginData', "Неправильні дані для входу");
            }
        }
    }
}
