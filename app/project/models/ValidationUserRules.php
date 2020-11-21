<?php

namespace App\Project\Models;

trait ValidationUserRules
{
    private function checkNotEmpty(array $data)
    {
        foreach ($data as $key => $field)
        {
            if (empty($field))
            {
                $this->addError($key,
                    "Поле $key не може бути пустим");
            }
        }
    }

    private function checkEmailMask($emailField)
    {
        if(!filter_var($emailField, FILTER_VALIDATE_EMAIL))
        {
            $this->addError("invalidMask",
                "Неправильно заповнене поле email");
        }
    }

    private function checkPasswordLength($password)
    {
        $length = iconv_strlen($password);
        if ($length < 8)
        {
            $this->addError("passwordLength",
                "Пароль не повинен бути менше 8 символів");
        }
    }
}