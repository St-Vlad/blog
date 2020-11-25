<?php

namespace App\Project\Utils;

class CSRFGenerator
{
    public function getCSRFtoken()
    {
        return $CSRFtoken = bin2hex(random_bytes(32));
    }
}
