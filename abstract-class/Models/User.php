<?php

require_once 'BaseClass.php';
require_once 'config/Database.php';

class User extends BaseClass {
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

    // function kepunyaan child-class
    public static function getAllUsers()
    {
        $db = Database::getConnection();
        $query = "SELECT * FROM users";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
