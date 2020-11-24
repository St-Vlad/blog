<?php


namespace App\Project\Models;


use App\Project\Utils\CSRFGenerator;

class LoginFormValidator extends FormModel
{
    use ValidationUserMethods;
    use CSRFChecker;

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
        var_dump($data);
        if (isset($data))
        {
            $this->data = $data;
        }
    }

    public function isValid()
    {
        $this->check_csrf($this->data);
        $this->checkNotEmpty($this->data);
        $this->checkEmailMask($this->data['email']);
        $this->checkPasswordLength($this->data['password']);
        $this->checkIsUserRegistered($this->data['email'], $this->data['password']);

        if (!empty($this->errors))
        {
            return false;
        }
        return true;
    }

    private function checkIsUserRegistered($email, $password)
    {
        $data = (new userDAO)->checkIsUserRegistered($email);
        if (password_verify($password, $data['password_hash']) && !empty($data['email'])) {
            return true;
        }
        else
            $this->addError('wrongLoginData', "Неправильні дані для входу");
    }
}
