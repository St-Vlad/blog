<?php

namespace App\Project\Models;

use App\Project\Utils\IdGenerator;
use App\Project\Utils\Paginator;

class ArticleService
{
    private $articlesDAO;

    public function __construct()
    {
        $this->articlesDAO = new ArticlesDAO();
    }

    public function getAllArticles($params)
    {
        $paginator = new Paginator($params, 6);
        $articles = $paginator->getPaginationData();
        $pageCount = $paginator->getPageCount();
        return [$articles, $pageCount];
    }

    public function getAllUserArticles($params, $userId)
    {
        $paginator = new Paginator($params, 6, $userId);
        $articles = $paginator->getPaginationData();
        $pageCount = $paginator->getPageCount();
        return [$articles, $pageCount];
    }

    public function createArticle(array $form)
    {
        $form = $this->checkStatus($form);
        $article = new Article(IdGenerator::generateId(),
                               $_SESSION['user_id'],
                               $form['article_title'],
                               $form['article_description'],
                               $form['article_text'],
                               $form['status']);
        $this->articlesDAO->createArticle($article);
    }

    public function getArticle($articleId)
    {
        return $this->articlesDAO->getArticleById($articleId);
    }

    public function deletePost($id)
    {
        return $this->articlesDAO->deleteArticleById($id);
    }

    public function editPost($id)
    {
        return $this->articlesDAO->getArticleById($id);
    }

    public function updateArticle(array $form)
    {
        $form = $this->checkStatus($form);
        $this->articlesDAO->updateArticle($form);
    }

    private function checkStatus($form)
    {
        if (isset($form['publish_status']))
        {
            $form['publish_status'] = 1;
        }
        else{
            $form['publish_status'] = 0;
        }
        return $form;
    }
}