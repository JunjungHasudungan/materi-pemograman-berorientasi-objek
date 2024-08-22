<?php

require_once 'BaseClass.php';
require_once 'config/Database.php';

// class User extends BaseClass {
//     public $role;
//     protected $db;

//     // menggunakan / override __construct dari parent
//     public function __construct($id = "", $name = "", $email = "", $address = "", $role = "")
//     {
//         parent::__construct($id, $name, $email, $address);

//         $this->role = $role;
//         $this->db = Database::getConnection();
//     }

//     // melakukan override function dari parent-class
//     public function register()
//     {
//           // Query untuk menyimpan data user ke dalam database
//           $query = "INSERT INTO users (id, name, email, address, role) VALUES (:id, :name, :email, :address, :role)";
//           $stmt = $this->db->prepare($query);
//           $stmt->bindParam(':id', $this->id);
//           $stmt->bindParam(':name', $this->name);
//           $stmt->bindParam(':email', $this->email);
//           $stmt->bindParam(':address', $this->address);
//           $stmt->bindParam(':role', $this->role);
//           $stmt->execute();
//     }

//     // function kepunyaan child-class
//     public static function getAllUsers()
//     {
//         $db = Database::getConnection();
//         $query = "SELECT * FROM users";
//         $stmt = $db->prepare($query);
//         $stmt->execute();
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     }

//     public static function getUserById(int $id) {
//         global $pdo;
//         $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
//         $stmt->bindParam(':id', $id);
//         $stmt->execute();
//         return $stmt->fetch(PDO::FETCH_ASSOC);
//     }

//     public function setData(array $data): void {
//         parent::setData($data);
//         if (isset($data['role'])) {
//             $this->role = $data['role'];
//         }
//     }

//     public function updateData(): bool {
//         $stmt = $this->pdo->prepare("UPDATE users SET name = :name, email = :email, address = :address, role = :role WHERE id = :id");
//         $stmt->bindParam(':name', $this->name);
//         $stmt->bindParam(':email', $this->email);
//         $stmt->bindParam(':address', json_encode($this->address));
//         $stmt->bindParam(':role', $this->role);
//         $stmt->bindParam(':id', $this->id);
//         return $stmt->execute();
//     }

//     public function getRole(): string {
//         return $this->role;
//     }
// }

class User extends BaseClass 
{
    public $role, $pdo;

    public function __construct($id = "", $name = "", $email = "", $address = "", $role = "")
    {
        parent::__construct($id, $name, $email, $address);
        $this->role = $role;
        $this->pdo = Database::getConnection();

    }

    public function setData($id): void
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->email = $data['email'];
            $this->address = $data['address'];
            $this->role = $data['role'];
        }
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

    public static function getAllUsers()
        {
            $db = Database::getConnection();
            $query = "SELECT * FROM users";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    public function register()
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, address, role) VALUES (:name, :email, :address, :role)");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':role', $this->role);
        return $stmt->execute();
    }

    public function getRole(): string
    {
        return $this->role;
    }

   
}