<?php

namespace App\Project\Models\DTO\Article;

trait CheckArticleStatus
{
    private function setStatus($status)
    {
        if (isset($status)) {
            $status = 1;
        } else {
            $status = 0;
        }
        return $status;
    }
}
