<?php

namespace App\Project\Controllers;

use App\Project\Models\Services\ArticleService;
use App\Project\Models\Forms\ArticleForm;
use App\Project\Utils\FormCleaner;

class CabinetController extends BaseController
{
    private $service;
    private $errors;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }
        $this->service = new ArticleService();
    }

    public function actionIndex($params)
    {
        $this->title = 'Ваші статті';

        [$articles, $pageCount] = $this->service->getAllUserArticles(
            $params,
            $_SESSION['user_id']
        );
        return $this->render(
            'cabinet/index',
            ['articles' => $articles, 'pageCount'=>$pageCount]
        );
    }

    public function actionCreateArticle()
    {
        $this->title = 'Створення статті';

        $articleForm = new ArticleForm();
        if (isset($_POST['submit']))
        {
            $form = FormCleaner::purify($_POST);
            $articleForm->load($form);
            if (!$articleForm->isValid()) {
                $this->errors = $articleForm->getErrors();
            } else {
                $this->service->createArticle($form);
                header("Location: /cabinet");
            }
        }
        return $this->render(
            'cabinet/createArticle',
            ['errors' => $this->errors]
        );
    }

    public function actionDeleteArticle($params)
    {
        if($this->service->deletePost($params['id'])) {
            header("Location: /cabinet");
        }
    }

    public function actionEditArticle($params)
    {
        $this->title = 'Редагування статті';

        $article = $this->service->editPost($params['id']);

        $articleForm = new ArticleForm();
        if (isset($_POST['submit'])) {
            $form = FormCleaner::purify($_POST);
            $articleForm->load($form);
            if (!$articleForm->isValid()) {
                $this->errors = $articleForm->getErrors();
            } else {
                $this->service->updateArticle($form);
                header("Location: /cabinet");
            }
        }
        return $this->render(
            'cabinet/editArticle',
            ['article' => $article, 'errors' => $this->errors]
        );
    }
}
