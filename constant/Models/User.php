<?php

require_once 'BaseClass.php'; // Menggunakan require_once untuk menghindari deklarasi ganda
require_once 'Config/database.php';

class User extends BaseClass {
    public $role;
    public $pdo;

    public function __construct($pdo, $id = "", $name = "", $email = "", $address = "", $role = "")
    {
        parent::__construct($id, $name, $email, $address);
        $this->pdo = $pdo;
        $this->role = $role;
    }

    public function save()
    {
        $query = "INSERT INTO users (name, address, email, role) VALUES (:name, :address, :email, :role)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':name' => $this->name,
            ':address' => $this->address,
            ':email' => $this->email,
            ':role' => $this->role
        ]);
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengambil hasil sebagai array asosiatif
    
        if (empty($rows)) {
            return null; // Mengembalikan null jika tidak ada pengguna
        }
    
        // Memetakan hasil ke objek User menggunakan konsep 
        // $users = [];
        // foreach ($rows as $row) {
        //     $user = new User($this->pdo, $row['id'], $row['name'], $row['email'], $row['address'], $row['role']);
        //     $users[] = $user;
        // }

        $users = array_map(function ($row) {
            return new User($this->pdo, $row['id'], $row['name'], $row['email'], $row['address'], $row['role']);
        }, $rows);
    
        return $users; // Mengembalikan array pengguna jika ada data
    }
    
}
