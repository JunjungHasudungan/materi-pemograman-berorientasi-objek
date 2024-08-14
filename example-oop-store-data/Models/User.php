<?php

require 'Config/database.php';

class User {
    
    public $id;
    public $name;
    public $email;
    public $address;

    private static $pdo;

    public function __construct($name = null, $email = null, $address = null, $id = null) {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->id = $id;
    }

    public static function setData($pdo) {
        self::$pdo = $pdo;
    }

    public static function create(array $dataUser) {
        $query = self::$pdo->prepare("INSERT INTO users (name, email, address) VALUES (:name, :email, :address)");
        $query->execute([
            'name' => $dataUser['name'],
            'email' => $dataUser['email'],
            'address' => $dataUser['address']
        ]);

        return new self(
            $dataUser['name'], 
            $dataUser['email'], 
            $dataUser['address'], 
            self::$pdo->lastInsertId()
        );
    }

    public static function all() {
        $query = self::$pdo->query("SELECT * FROM users");
        $listUsers = $query->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        foreach ($listUsers as $user) {
            $users[] = new User($user['name'], $user['email'], $user['address'], $user['id']);
        }

        return $users;
    }
}

User::setData($pdo);
?>
