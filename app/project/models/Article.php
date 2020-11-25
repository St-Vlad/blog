<?php

namespace App\Project\Models;

class Article
{
    private $article_id;
    private $user_id;
    private $article_title;
    private $article_description;
    private $article_text;
    private $status;

    public function __construct(
        $article_id,
        $user_id,
        $article_title,
        $article_description,
        $article_text,
        $status
    ) {
        $this->article_id = $article_id;
        $this->user_id = $user_id;
        $this->article_title = $article_title;
        $this->article_description = $article_description;
        $this->article_text = $article_text;
        $this->status = $status;
    }

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

    public function getArticleText()
    {
        return $this->article_text;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
