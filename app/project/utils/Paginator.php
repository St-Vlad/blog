<?php

namespace App\Project\Utils;

use App\Project\Models\DAO\ArticlesDAO;

class Paginator
{
    private $pageNumber;
    private $pageLimit;
    private $userId;
    private $articlesDAO;

    public function __construct($params, $pageLimit, $userId = null)
    {
        $this->pageNumber = $this->getPageNumber($params);
        $this->pageLimit = $pageLimit;
        $this->userId = $userId;
        $this->articlesDAO = new ArticlesDAO();
    }

    public function getPaginationData()
    {
        $articles = [];
        $pageShift = $this->getPageShift();
        if (!is_null($this->userId)) {
            $articles = $this->articlesDAO->getAllUserArticles(
                $pageShift,
                $this->pageLimit,
                $this->userId
            );
        } else {
            $articles = $this->articlesDAO->getAllArticles(
                $pageShift,
                $this->pageLimit
            );
        }
        return $articles;
    }

    public function getPageCount()
    {
        $totalCount = 0;
        if (!is_null($this->userId)) {
            $totalCount = $this->articlesDAO->getUserArticlesCount($this->userId);
        } else {
            $totalCount = $this->articlesDAO->getArticlesCount();
        }
        return ceil($totalCount / $this->pageLimit);
    }

    private function getPageShift()
    {
        return $pageShift = ($this->pageNumber - 1) * $this->pageLimit;
    }

    public function getPageNumber($params)
    {
        if (!isset($params['page'])) {
            return $pageNumber = 1;
        } else {
            return $pageNumber = abs(intval($params['page']));
        }
    }
}
