<?php

namespace App\Project\Models\DTO\Article;

class UpdateArticleDTO
{
    use CheckArticleStatus;

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
        $this->status = $this->setStatus($form['status']);
    }

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
    public function getArticleText()
    {
        return $this->article_text;
    }

    /**
     * @return mixed
     */
    public function getArticleStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $articleStatus
     */
    public function setArticleStatus($articleStatus)
    {
        $this->status = $articleStatus;
    }
}
