<?php

namespace App\Project\Models\Services;

use App\Project\Models\DTO\Article\CreateArticleDTO;
use App\Project\Models\DAO\ArticlesDAO;
use App\Project\Models\DTO\Article\DeleteArticleDTO;
use App\Project\Models\DTO\Article\UpdateArticleDTO;
use App\Project\Utils\Paginator;

class ArticleService
{
    private $articlesDAO;

    public function __construct()
    {
        $this->articlesDAO = new ArticlesDAO();
    }

    public function getAllArticles(array $params)
    {
        $paginator = new Paginator($params, 6);
        $articles = $paginator->getPaginationData();
        $pageCount = $paginator->getPageCount();
        return [$articles, $pageCount];
    }

    public function getAllUserArticles(array $params, $userId)
    {
        $paginator = new Paginator($params, 6, $userId);
        $articles = $paginator->getPaginationData();
        $pageCount = $paginator->getPageCount();
        return [$articles, $pageCount];
    }

    public function createArticle(CreateArticleDTO $createArticleDTO)
    {
        $this->articlesDAO->createArticle($createArticleDTO);
    }

    public function getArticleByID($articleId)
    {
        return $this->articlesDAO->getArticleById($articleId);
    }

    public function deleteArticle(DeleteArticleDTO $deleteArticleDTO)
    {
        return $this->articlesDAO->deleteArticleById($deleteArticleDTO);
    }

    public function updateArticle(UpdateArticleDTO $updateArticleDTO)
    {
        $this->articlesDAO->updateArticle($updateArticleDTO);
    }
}
