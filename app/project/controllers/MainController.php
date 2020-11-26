<?php

namespace App\Project\Controllers;

use App\Project\Models\Services\ArticleService;
use App\Project\Utils\RequestParamChecker;

class MainController extends BaseController
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new ArticleService();
    }

    public function actionIndex($params)
    {
        $this->title = "Головна";

        if (isset($params['page'])){
            if (!RequestParamChecker::isValid($params['page'])) {
                return $this->render('not_found');
            }
        }

        [$articles, $pageCount] = $this->service->getAllArticles($params);
        return $this->render(
            'index',
            ['articles' => $articles, 'pageCount'=>$pageCount]
        );
    }

    public function actionArticleView($params)
    {
        $this->title = "Перегляд статті";

        if (!RequestParamChecker::isValid($params['id'])) {
            return $this->render('not_found');
        }
        $article = $this->service->getArticleByID($params['id']);
        return $this->render('article', ['article' => $article]);
    }
}
