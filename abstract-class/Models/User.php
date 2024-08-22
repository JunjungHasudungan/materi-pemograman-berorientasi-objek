<?php

require_once 'AbstractUser.php';
require_once 'config/Database.php';

class User extends AbstractUser {
    public $role;
    protected $db;

    // menggunakan / override __construct dari parent
    public function __construct($id = "", $name = "", $email = "", $address = "", $role = "")
    {
        parent::__construct($id, $name, $email, $address);

        $this->role = $role;
        $this->db = Database::getConnection();
    }

    // melakukan override function dari parent-class
    public function register()
    {
          // Query untuk menyimpan data user ke dalam database
          $query = "INSERT INTO users (id, name, email, address, role) VALUES (:id, :name, :email, :address, :role)";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':id', $this->id);
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':address', $this->address);
          $stmt->bindParam(':role', $this->role);
          $stmt->execute();
    }

    public function setData($id): void
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch();
        
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->address = $data['address'];
        $this->role = $data['role'];
    }

    // function kepunyaan child-class
    public static function getAllUsers()
    {
        $db = Database::getConnection();
        $query = "SELECT * FROM users";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(): bool
    {
        $stmt = $this->pdo->prepare("UPDATE users SET name = :name, email = :email, address = :address, role = :role WHERE id = :id");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }
}
