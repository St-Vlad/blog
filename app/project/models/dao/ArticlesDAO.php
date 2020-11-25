<?php

namespace App\Project\Models\DAO;

use App\Core\Db\DBConnection;
use App\Project\Models\Article;
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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteArticleById($id)
    {
        $sql = "DELETE FROM 
                    `articles` 
                WHERE 
                    `article_id` = :article_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':article_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
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
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createArticle(Article $article)
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

    public function updateArticle($form)
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
            $form['article_title'],
            PDO::PARAM_STR
        );
        $stmt->bindValue(
            ':article_description',
            $form['article_description'],
            PDO::PARAM_STR
        );
        $stmt->bindValue(
            ':article_text',
            $form['article_text'],
            PDO::PARAM_STR
        );
        $stmt->bindValue(
            ':status',
            $form['status'],
            PDO::PARAM_INT
        );
        $stmt->bindValue(
            ':article_id',
            $form['article_id'],
            PDO::PARAM_INT
        );
        $stmt->execute();
        return true;
    }
}
