<?php

namespace App\Project\Models\DTO\Article;

use App\Project\Models\DTO\Article\CheckArticleStatus;
use App\Project\Utils\IdGenerator;

class CreateArticleDTO
{
    use CheckArticleStatus;

    private $article_id;
    private $user_id;
    private $article_title;
    private $article_description;
    private $article_text;
    private $status;

    public function __construct($form) {
        $this->article_id = IdGenerator::generateId();
        $this->user_id = $_SESSION['user_id'];
        $this->article_title = $form['article_title'];
        $this->article_description = $form['article_description'];
        $this->article_text = $form['article_text'];
        $this->status = $this->setStatus($form['status']);
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
