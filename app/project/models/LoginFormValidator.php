<?php


namespace App\Project\Models;


class LoginFormValidator extends FormModel
{
    use ValidationUserMethods;

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
