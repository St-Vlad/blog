<?php

namespace App\Project\Models\DAO;

use App\Core\Db\DBConnection;
use App\Project\Models\DTO\Article\CreateArticleDTO;
use App\Project\Models\DTO\Article\DeleteArticleDTO;
use App\Project\Models\DTO\Article\GetAllArticlesDTO;
use App\Project\Models\DTO\Article\GetAllUserArticles;
use App\Project\Models\DTO\Article\UpdateArticleDTO;
use App\Project\Models\DTO\Article\ViewSingleArticleDTO;

use PDO;

class ArticlesDAO extends DBConnection
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getDb();
    }

    public function getUserArticlesCount($userId)
    {
        $sql = "SELECT 
                    COUNT(*) 
                FROM 
                    `articles` 
                WHERE 
                    `articles`.`user_id` = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(
            ':user_id',
            $userId,
            PDO::PARAM_INT
        );
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        return $count['COUNT(*)'];
    }

    public function getArticlesCount()
    {
        $sql = "SELECT 
                    COUNT(*) 
                FROM 
                    `articles`
                WHERE 
                    `status` = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        return $count['COUNT(*)'];
    }

    public function getAllArticles($pageNumber, $pageLimit)
    {
        $sql = "SELECT 
                    `article_id`, 
                    `article_title`, 
                    `article_description`, 
                    `creation_date`
                FROM 
                    `articles` 
                WHERE 
                    `status` = 1 
                ORDER BY 
                    `creation_date` 
                DESC
                LIMIT 
                    :pageNumber, :pageLimit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':pageNumber', $pageNumber, PDO::PARAM_INT);
        $stmt->bindValue(':pageLimit', $pageLimit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(
            PDO::FETCH_CLASS,
            GetAllArticlesDTO::class
        );
    }

    public function getAllUserArticles($pageNumber, $pageLimit, $userId)
    {
        $sql = "SELECT 
                    `article_id`, 
                    `user_id`, 
                    `article_title`, 
                    `article_description`, 
                    `status`, 
                    `creation_date` 
                FROM 
                    `articles` 
                WHERE 
                    `articles`.`user_id` = :user_id
                ORDER BY 
                    `creation_date` 
                DESC                                 
                LIMIT 
                    :pageNumber, :pageLimit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':pageNumber', $pageNumber, PDO::PARAM_INT);
        $stmt->bindValue(':pageLimit', $pageLimit, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(
            PDO::FETCH_CLASS,
            GetAllUserArticles::class
        );
    }

    // UserRegisterDTO MUST login into his origin account to delete article
    // in the other hand, this will affect 0 rows
    public function deleteArticleById(DeleteArticleDTO $deleteArticleDTO)
    {
        $sql = "DELETE FROM 
                    `articles` 
                WHERE 
                    `article_id` = :article_id AND `user_id` = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(
            ':article_id',
            $deleteArticleDTO->getArticleId(),
            PDO::PARAM_INT
        );
        $stmt->bindValue(
            ':user_id',
            $deleteArticleDTO->getUserId(),
            PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getArticleById($id)
    {
        $sql = "SELECT 
                    `article_id`, 
                    `articles`.`user_id`,             
                    `users`.`username`, 
                    `article_title`, 
                    `article_description`, 
                    `article_text`, 
                    `status`, 
                    `creation_date` 
                FROM 
                    `articles` 
                JOIN users ON `articles`.`user_id` = `users`.`user_id` 
                WHERE 
                    `article_id` = :article_id
                LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':article_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(ViewSingleArticleDTO::class);
    }

    public function createArticle(CreateArticleDTO $article)
    {
        $sql = "INSERT INTO `articles`(
                    `article_id`, 
                    `user_id`, 
                    `article_title`, 
                    `article_description`, 
                    `article_text`, 
                    `status`, 
                    `creation_date`
                ) 
                VALUES (
                    :article_id, 
                    :user_id, 
                    :article_title, 
                    :article_description,
                    :article_text, 
                    :status, 
                    CURRENT_TIMESTAMP
                )";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(
            ':article_id',
            $article->getArticleId(),
            PDO::PARAM_INT
        );
        $stmt->bindValue(
            ':user_id',
            $article->getUserId(),
            PDO::PARAM_INT
        );
        $stmt->bindValue(
            ':article_title',
            $article->getArticleTitle(),
            PDO::PARAM_STR
        );
        $stmt->bindValue(
            ':article_description',
            $article->getArticleDescription(),
            PDO::PARAM_STR
        );
        $stmt->bindValue(
            ':article_text',
            $article->getArticleText(),
            PDO::PARAM_STR
        );
        $stmt->bindValue(
            ':status',
            $article->getStatus(),
            PDO::PARAM_INT
        );
        $stmt->execute();
        return true;
    }

    public function updateArticle(UpdateArticleDTO $updateArticleDTO)
    {
        $sql = "UPDATE 
                    `articles` 
                SET 
                    `article_title`= :article_title,
                    `article_description`= :article_description, 
                    `article_text`= :article_text,
                    `status`= :status 
                WHERE 
                    `article_id` = :article_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(
            ':article_title',
            $updateArticleDTO->getArticleTitle(),
            PDO::PARAM_STR
        );
        $stmt->bindValue(
            ':article_description',
            $updateArticleDTO->getArticleDescription(),
            PDO::PARAM_STR
        );
        $stmt->bindValue(
            ':article_text',
            $updateArticleDTO->getArticleText(),
            PDO::PARAM_STR
        );
        $stmt->bindValue(
            ':status',
            $updateArticleDTO->getArticleStatus(),
            PDO::PARAM_INT
        );
        $stmt->bindValue(
            ':article_id',
            $updateArticleDTO->getArticleId(),
            PDO::PARAM_INT
        );
        $stmt->execute();
        return true;
    }
}
