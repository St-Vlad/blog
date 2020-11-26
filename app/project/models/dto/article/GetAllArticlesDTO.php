<?php

namespace App\Project\Models\DTO\Article;

class GetAllArticlesDTO
{
    private $article_id;
    private $article_title;
    private $article_description;
    private $creation_date;

    public function getArticleId()
    {
        return $this->article_id;
    }

    public function getArticleTitle()
    {
        return $this->article_title;
    }

    public function getArticleDescription()
    {
        return $this->article_description;
    }

    public function getCreationDate()
    {
        return $this->creation_date;
    }
}

