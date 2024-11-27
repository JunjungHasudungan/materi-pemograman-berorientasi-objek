<?php

namespace App\ServiceTrait;

use App\Config\Database;

trait InteractWithDatabase {
    
    public $pdo;

    public function setConnection() 
    {
        $this->pdo = Database::getConnection();
    }
    
    public static function all($table)  
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM {$table}");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById($table, $id)
    {
        if (!$this->pdo) {
            $this->setConnection();
        }

        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function deleteById($table, $id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM {$table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
