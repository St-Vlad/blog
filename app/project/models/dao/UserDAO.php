<?php

namespace App\Project\Models\DAO;

use App\Core\Db\DBConnection;
use App\Project\Models\User;
use PDO;

class UserDAO extends DBConnection
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = $this->getDb();
    }

    public function create(User $user)
    {
        $sql = "INSERT INTO `users`(
                    `user_id`, 
                    `username`, 
                    `email`, 
                    `password_hash`
                ) 
                VALUES (
                    :user_id, 
                    :username, 
                    :email, 
                    :password_hash
                )";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(
            [
                ':user_id' => $user->getId(),
                ':username' => $user->getUsername(),
                ':email' => $user->getEmail(),
                ':password_hash' => $user->getPassword()
            ]
        );
        return true;
    }

    public function getRegisteredUser($email)
    {
        $sql = "SELECT 
                    `user_id`, 
                    `username`  
                FROM 
                    `users` 
                WHERE 
                    `email` = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
