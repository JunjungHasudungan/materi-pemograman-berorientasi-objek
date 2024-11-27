<?php

namespace App\Models;

use App\Models\BaseClass;
use App\ServiceTrait\InteractWithDatabase;
use App\Config\Database;

require_once 'App/Config/config.php';

class User extends BaseClass {

    use InteractWithDatabase;

    public $role, $pdo, $table;
    public static $database;

    public function __construct($id = "", $name = "", $email = "", $address = "", $role = "")  {
        parent::__construct($id, $name, $email, $address);
        $this->role = $role;
        $this->pdo = Database::getConnection();
        $this->table = 'users';
    }

    public function setData($id): void {

        $data = $this->findById($this->table, $id);

        if ($data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->email = $data['email'];
            $this->address = $data['address'];
            $this->role = $data['role'];
        }
    }

    public function update(): bool {
        $stmt = $this->pdo->prepare("UPDATE users SET name = :name, email = :email, address = :address, role = :role WHERE id = :id");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    public static function all()
    {
        $db = Database::getConnection();
        $query = "SELECT * FROM users";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
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

    public function setRole($role): void 
    {
        $this->role = $role;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public static function create(array $data) {

    self::$database = Database::getConnection(); // Ambil koneksi dat$database di method static
    $stmt = self::$database->prepare("INSERT INTO users (name, email, address, role) VALUES (:name, :email, :address, :role)");
    $stmt->bindParam(':name', $data['name']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':address', $data['address']);
    $stmt->bindParam(':role', $data['role']);
    $stmt->execute();

        return new self(
            $data['name'], 
            $data['email'], 
            $data['address'], 
            $data['role']
        );

    }
}