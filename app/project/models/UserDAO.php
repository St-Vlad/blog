<?php

namespace App\Project\Models;

use App\Core\Db\DBConnection;
use PDO;

class UserDAO extends DBConnection
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function create(User $user)
    {
        $pdo = $this->getDb();
        $stmt = $pdo->prepare("INSERT INTO `users`(`user_id`, `username`, 
                                        `email`, `password_hash`) 
                                        VALUES (:user_id, :username, :email, 
                                        :password_hash)");
        $stmt->execute([':user_id' => $user->getId(),
                ':username' => $user->getUsername(),
                ':email' => $user->getEmail(),
                ':password_hash' => $user->getPassword()]);
        return true;
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function getExistingEmail($email)
    {
        $pdo = $this->getDb();
        $stmt = $pdo->prepare("SELECT `email` FROM `users` WHERE `email` = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}