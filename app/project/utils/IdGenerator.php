<?php

namespace App\Project\Utils;

class IdGenerator
{
    public static function generateId()
    {
        return hexdec(uniqid());
    }
}
