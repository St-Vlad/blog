<?php

namespace App\Project\Utils;

class FormCleaner
{
    public static function purify(array $data)
    {
        unset($data['submit']);
        foreach ($data as $field => &$value) {
            $value = trim($value);
            $value = filter_var($value,FILTER_SANITIZE_STRING);
        }
        return $data;
    }
}
