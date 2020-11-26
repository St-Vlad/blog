<?php

namespace App\Project\Models\DAO;

use App\Core\Db\DBConnection;
use PDO;

class ValidationDAO extends DBConnection
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getDb();
    }

    public function checkIsUserRegistered($email)
    {
        $sql = "SELECT 
                    `email`, 
                    `password_hash` 
                FROM 
                    `users` 
                WHERE 
                    `email` = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getExistingEmail($email)
    {
        $sql = "SELECT 
                    `email` 
                FROM 
                    `users` 
                WHERE 
                    `email` = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
