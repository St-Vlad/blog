<?php

namespace App\Project\Models\DTO\Article;

class ViewSingleArticleDTO
{
    private $article_id;
    private $user_id;
    private $username;
    private $article_title;
    private $article_description;
    private $article_text;
    private $status;
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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
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
    public function getArticleText()
    {
        return $this->article_text;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }
}
