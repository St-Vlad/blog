<?php

namespace App\Project\Models\DTO\Article;

class GetAllArticlesDTO
{
    private $article_id;
    private $article_title;
    private $article_description;
    private $creation_date;

    /**
     * @return mixed
     */
    public function getArticleId()
    {
        return $this->article_id;
    }

    /**
     * @return mixed
     */
    public function getArticleTitle()
    {
        return $this->article_title;
    }

    /**
     * @return mixed
     */
    public function getArticleDescription()
    {
        return $this->article_description;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }
}

