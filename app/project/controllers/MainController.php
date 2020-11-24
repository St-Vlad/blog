<?php

namespace App\Project\Controllers;

use App\Project\Models\Services\ArticleService;

class MainController extends BaseController
{

    private $service;

    public function __construct()
    {
        $this->service = new ArticleService();
    }

    public function actionIndex($params)
    {
        $this->title = "Головна";
        [$articles, $pageCount] = $this->service->getAllArticles($params);
        return $this->render('index', ['articles' => $articles,
                                            'pageCount'=>$pageCount]);
    }

    public function actionArticleView($params)
    {
        $this->title = "Перегляд статті";
        $article = $this->service->getArticle($params['id']);
        return $this->render('article', ['article' => $article]);
    }
}