<?php

namespace App\Project\Models\Forms;

abstract class FormModel
{
    protected $errors = [];

    public function addError($attribute, $error)
    {
        $this->errors[$attribute] = $error;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public abstract function load($data);
    public abstract function isValid();
}
