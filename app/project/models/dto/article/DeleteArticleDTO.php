<?php

namespace App\Project\Models\DTO\Article;

class DeleteArticleDTO
{
    private $articleId;
    private $userId;

    public function __construct($articleId, $userId)
    {
        $this->articleId = $articleId;
        $this->userId = $userId;
    }

    public function getArticleId()
    {
        return $this->articleId;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
