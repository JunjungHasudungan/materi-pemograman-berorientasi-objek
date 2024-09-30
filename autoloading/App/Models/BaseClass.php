<?php
    namespace App\Models;

    use App\Config\Database;
    use App\Utilities\PersonInterface;
    
abstract class BaseClass implements PersonInterface
{
    public $pdo, $id, $name, $email, $address;

    public function __construct($id, $name, $email, $address) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->pdo = Database::getConnection();
    }

    // membuat abstract function 
    abstract public function setData($id): void;
    abstract public function register();

    public function update(): bool {
        return false;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setAdress($address): void  {
        $this->address = $address;
    }
}