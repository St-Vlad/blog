<?php

namespace App\Project\Models\dto;

class UpdateArticleDTO
{
    private $articleId;
    private $articleTitle;
    private $articleDescription;
    private $articleText;
    private $articleStatus;

    public function __construct(
        $articleId,
        $articleTitle,
        $articleDescription,
        $articleText,
        $articleStatus
    )
    {
        $this->articleId = $articleId;
        $this->articleTitle = $articleTitle;
        $this->articleDescription = $articleDescription;
        $this->articleText = $articleText;
        $this->articleStatus = $articleStatus;
    }

    /**
     * @return mixed
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * @return mixed
     */
    public function getArticleTitle()
    {
        return $this->articleTitle;
    }

    /**
     * @return mixed
     */
    public function getArticleDescription()
    {
        return $this->articleDescription;
    }

    /**
     * @return mixed
     */
    public function getArticleText()
    {
        return $this->articleText;
    }

    /**
     * @return mixed
     */
    public function getArticleStatus()
    {
        return $this->articleStatus;
    }

    /**
     * @param mixed $articleStatus
     */
    public function setArticleStatus($articleStatus): void
    {
        $this->articleStatus = $articleStatus;
    }
}
