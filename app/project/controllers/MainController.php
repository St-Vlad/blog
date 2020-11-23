<?php

namespace App\Project\Controllers;

use App\Project\Models\ArticleService;

class MainController extends BaseController
{

    private $service;

    public function __construct()
    {
        $this->service = new ArticleService();
    }

    public function actionIndex($params)
    {
        [$articles, $pageCount] = $this->service->getAllArticles($params);
        return $this->render('index', ['articles' => $articles,
                                            'pageCount'=>$pageCount]);
    }

    public function actionArticleView($params)
    {
        $article = $this->service->getArticle($params['id']);
        return $this->render('article', ['article' => $article]);
    }
}