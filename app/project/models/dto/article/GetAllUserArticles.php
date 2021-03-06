<?php

namespace App\Project\Models\DTO\Article;

class GetAllUserArticles
{
    private $article_id;
    private $user_id;
    private $article_title;
    private $article_description;
    private $status;
    private $creation_date;

    public function getArticleId()
    {
        return $this->article_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getArticleTitle()
    {
        return $this->article_title;
    }

    public function getArticleDescription()
    {
        return $this->article_description;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCreationDate()
    {
        return $this->creation_date;
    }
}
