<?php


namespace App\Project\Models;


class ArticleFormValidator extends FormModel
{
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

        if (!empty($this->errors))
        {
            return false;
        }
        return true;
    }

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
}