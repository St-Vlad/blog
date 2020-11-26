<?php

namespace App\Project\Utils;

class Hasher
{
    public static function getHash($string)
    {
        return password_hash($string, PASSWORD_BCRYPT);
    }
}
