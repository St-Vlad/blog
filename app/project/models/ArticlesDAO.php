<?php

namespace App\Project\Models;

use App\Core\Db\DBConnection;
use PDO;

class ArticlesDAO extends DBConnection
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = $this->getDb();
    }

    public function getArticlesCount($userId)
    {
        $sql = "SELECT COUNT(*) FROM `articles`";
        if (!is_null($userId))
        {
            $sql .= "WHERE `articles`.`user_id` = :user_id";
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        return $count['COUNT(*)'];
    }

    public function getAllArticles($pageNumber, $pageLimit)
    {
        $stmt = $this->pdo->prepare("SELECT `article_id`, `article_name`, `short_description`, `creation_date`
                                    FROM `articles` 
                                    ORDER BY `creation_date` DESC
                                    LIMIT :pageNumber, :pageLimit");
        $stmt->bindParam(':pageNumber', $pageNumber, PDO::PARAM_INT);
        $stmt->bindParam(':pageLimit', $pageLimit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllUserArticles($pageNumber, $pageLimit, $userId)
    {
        $stmt = $this->pdo->prepare("SELECT `article_id`, `user_id`, `article_name`, 
                                  `short_description`, `status`, `creation_date` 
                                  FROM `articles` 
                                  WHERE `articles`.`user_id` = :user_id
                                  ORDER BY `creation_date` DESC                                 
                                  LIMIT :pageNumber, :pageLimit");
        $stmt->bindParam(':pageNumber', $pageNumber, PDO::PARAM_INT);
        $stmt->bindParam(':pageLimit', $pageLimit, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteArticleById($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM `articles` WHERE `article_id` = :article_id");
        $stmt->bindParam(':article_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    public function getArticleById($id)
    {
        $stmt = $this->pdo->prepare("SELECT `article_id`, `articles`.`user_id`, 
                                    `users`.`username`, `article_name`, 
                                    `short_description`, `article_text`, `status`, `creation_date` 
                                    FROM `articles` 
                                    JOIN users ON `articles`.`user_id` = `users`.`user_id` 
                                    WHERE `article_id` = :article_id
                                    LIMIT 1");
        $stmt->bindParam(':article_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateArticle($form)
    {
        $stmt = $this->pdo->prepare("UPDATE `articles` SET `article_name`= :article_name,
                                    `short_description`= :short_description, `article_text`= :article_text,
                                    `status`= :status WHERE `article_id` = :article_id");
        $stmt->bindParam(':article_name', $form['article_name'], PDO::PARAM_STR);
        $stmt->bindParam(':short_description', $form['short_description'], PDO::PARAM_STR);
        $stmt->bindParam(':article_text', $form['article_text'], PDO::PARAM_STR);
        $stmt->bindParam(':status', $form['publish_status'], PDO::PARAM_INT);
        $stmt->bindParam(':article_id', $form['article_id'], PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
}