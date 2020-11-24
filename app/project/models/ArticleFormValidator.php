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
        $this->checkTitleLength($this->data);
        $this->checkDescriptionLength($this->data);
        $this->checkTextLength($this->data);

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

    private function checkTitleLength(array $data)
    {
        if (iconv_strlen($data['article_title']) > 120)
        {
            $this->addError('titleLength',
                "Назва не може бути більшою за 120 символів");
        }
    }

    private function checkDescriptionLength(array $data)
    {
        if (iconv_strlen($data['article_description']) > 500)
        {
            $this->addError('descriptionLength',
                "Опис не може бути більшим за 500 символів");
        }
    }

    private function checkTextLength(array $data)
    {
        if (iconv_strlen($data['article_text']) > 30000)
        {
            $this->addError('textLength',
                "Назва не може бути більшою за 100 символів");
        }
    }
}