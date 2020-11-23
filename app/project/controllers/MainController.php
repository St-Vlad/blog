<?php

namespace App\Project\Controllers;

use App\Project\Models\ArticleService;

class MainController extends BaseController
{
    public function actionIndex($params)
    {
        $service = new ArticleService();
        [$articles, $pageCount] = $service->getAllArticles($params);
        return $this->render('index', ['articles' => $articles,
                                            'pageCount'=>$pageCount]);
    }
}