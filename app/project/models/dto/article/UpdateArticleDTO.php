<?php

namespace App\Project\Models\DTO\Article;

class UpdateArticleDTO
{
    private $article_id;
    private $article_title;
    private $article_description;
    private $article_text;
    private $status;

    public function __construct(array $form)
    {
        $this->article_id = $form['article_id'];
        $this->article_title = $form['article_title'];
        $this->article_description = $form['article_description'];
        $this->article_text = $form['article_text'];
        $this->status = isset($form['status']) ? 1 : 0;
    }

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

    public function getArticleText()
    {
        return $this->article_text;
    }

    public function getArticleStatus()
    {
        return $this->status;
    }

    public function setArticleStatus($articleStatus)
    {
        $this->status = $articleStatus;
    }
}
