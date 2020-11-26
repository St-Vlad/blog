<?php

namespace App\Project\Utils;

class RequestParamChecker
{
    public static function isValid($id)
    {
        if (preg_match("/^[1-9][0-9]*$/", $id)) {
            return true;
        }
        return false;
    }
}
