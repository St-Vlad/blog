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
        $this->service = new ArticleService();
    }

    public function actionIndex($params)
    {
        $this->title = 'Ваші статті';
        if (isset($_SESSION['user_id'])) {
            [$articles, $pageCount] = $this->service->getAllUserArticles($params, $_SESSION['user_id']);
            return $this->render('cabinet/index', ['articles' => $articles,
                                                        'pageCount'=>$pageCount]);
        }
        else{
            header("Location: /login");
        }
    }

    public function actionCreateArticle()
    {
        $this->title = 'Створення статті';
        if (isset($_SESSION['user_id']))
        {
            $articleForm = new ArticleForm();
            if (isset($_POST['submit']))
            {
                $form = FormCleaner::purify($_POST);
                $articleForm->load($form);
                if (!$articleForm->isValid())
                {
                    $this->errors = $articleForm->getErrors();
                }
                else{
                    $this->service->createArticle($form);
                    header("Location: /cabinet");
                }
            }
            return $this->render('cabinet/createArticle', ['errors' => $this->errors]);
        }
        else{
            header("Location: /login");
        }
    }

    public function actionDeleteArticle($params)
    {
        if (isset($_SESSION['user_id'])) {
            if($this->service->deletePost($params['id'])){
                header("Location: /cabinet");
            }
        }
        else{
            header("Location: /login");
        }
    }

    public function actionEditArticle($params)
    {
        $this->title = 'Редагування статті';
        if (isset($_SESSION['user_id'])) {
            $article = $this->service->editPost($params['id']);
            return $this->render('cabinet/editPost', ['article' => $article]);
        }
        else{
            header("Location: /login");
        }
    }

    public function actionUpdateArticle()
    {
        if (isset($_SESSION['user_id'])) {
            $articleForm = new ArticleForm();
            if (isset($_POST['submit']))
            {
                $form = FormCleaner::purify($_POST);

                $articleForm->load($form);
                if (!$articleForm->isValid()) {
                    $this->errors = $articleForm->getErrors();
                }
                else{
                    $this->service->updateArticle($form);
                    header("Location: /cabinet");
                }
            }
            $this->render('cabinet/editPost', ['errors' => $this->errors]);
        }
        else{
            header("Location: /login");
        }
    }
}