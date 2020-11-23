<?php

namespace App\Project\Controllers;

use App\Project\Models\ArticleFormValidator;
use App\Project\Models\ArticleService;
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
        if (isset($_SESSION['user_id'])) {
            [$articles, $pageCount] = $this->service->getAllUserArticles($params, $_SESSION['user_id']);
            return $this->render('cabinet/index', ['articles' => $articles,
                                                        'pageCount'=>$pageCount]);
        }
        else{
            header("Location: /");
        }
    }

    public function deletePost($params)
    {
        if (isset($_SESSION['user_id'])) {
            if($this->service->deletePost($params['id'])){
                header("Location: /cabinet");
            }
        }
        else{
            header("Location: /");
        }
    }

    public function editPost($params)
    {
        if (isset($_SESSION['user_id'])) {
            $article = $this->service->editPost($params['id']);
            return $this->render('cabinet/editPost', ['article' => $article]);
        }
        else{
            header("Location: /");
        }
    }

    public function updatePost()
    {
        if (isset($_SESSION['user_id'])) {
            if (isset($_POST['submit']))
            {
                $articleForm = new ArticleFormValidator();
                $form = FormCleaner::purify($_POST);

                $articleForm->load($form);
                if (!$articleForm->isValid()) {
                    $this->errors = $articleForm->getErrors();
                }
                else{
                    $this->service->updateArticle($form);
                    header("Location: /cabinet");
                }
                $this->render('cabinet/editPost', ['errors' => $this->errors]);
            }
        }
        else{
            header("Location: /");
        }
    }
}