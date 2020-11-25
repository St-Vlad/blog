<?php

namespace App\Project\Models\Forms;

trait ValidationUserMethods
{
    private function checkUsernameLength($username)
    {
        $length = iconv_strlen($username);
        if ($length > 50) {
            $this->addError(
                "usernameLength",
                "Занадто довге ім'я користувача"
            );
        }
    }

    private function checkNotEmpty(array $data)
    {
        foreach ($data as $key => $field) {
            if (empty($field)) {
                $this->addError(
                    'empty' . $key,
                    "Поле {$this->fields[$key]} не може бути пустим"
                );
            }
        }
    }

    private function checkEmailMask($emailField)
    {
        if(!filter_var($emailField, FILTER_VALIDATE_EMAIL)) {
            $this->addError(
                "invalidMask",
                "Неправильно заповнене поле email"
            );
        }
    }

    private function checkPasswordLength($password)
    {
        $length = iconv_strlen($password);
        if ($length < 8) {
            $this->addError(
                "passwordLength",
                "Пароль не повинен бути менше 8 символів"
            );
        }
    }
}
