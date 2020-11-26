<?php

namespace App\Project\Controllers;

use App\Project\Models\DTO\Article\CreateArticleDTO;
use App\Project\Models\DTO\Article\DeleteArticleDTO;
use App\Project\Models\DTO\Article\UpdateArticleDTO;
use App\Project\Models\Services\ArticleService;
use App\Project\Models\Forms\ArticleForm;
use App\Project\Utils\FormCleaner;
use App\Project\Utils\RequestParamChecker;

class CabinetController extends BaseController
{
    private $service;
    private $errors;

    public function __construct()
    {
        parent::__construct();
        $this->service = new ArticleService();

        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }
    }

    public function actionIndex($params)
    {
        if (isset($params['page'])){
            if (!RequestParamChecker::isValid($params['page'])) {
                return $this->render('not_found');
            }
        }

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
                $createArticleDTO = new CreateArticleDTO($form);
                $this->service->createArticle($createArticleDTO);
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
        $deleteArticleDTO = new DeleteArticleDTO(
            $params['id'],
            $_SESSION['user_id']
        );
        if($this->service->deleteArticle($deleteArticleDTO)) {
            header("Location: /cabinet");
        }
    }

    public function actionEditArticle($params)
    {
        $this->title = 'Редагування статті';

        if (!RequestParamChecker::isValid($params['id'])) {
            return $this->render('not_found');
        }

        $article = $this->service->getArticleByID($params['id']);
        $articleForm = new ArticleForm();

        if (isset($_POST['submit'])) {
            $form = FormCleaner::purify($_POST);
            $articleForm->load($form);
            if (!$articleForm->isValid()) {
                $this->errors = $articleForm->getErrors();
            } else {
                $articleDTO = new UpdateArticleDTO($form);
                $this->service->updateArticle($articleDTO);
                header("Location: /cabinet");
            }
        }
        return $this->render(
            'cabinet/editArticle',
            ['article' => $article, 'errors' => $this->errors]
        );
    }
}
