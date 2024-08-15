<?php
    // pembuatan class 
    class User {
    
        // melakukan registrasi properti yang dibutuhkan
        public $id, $name, $email, $address, $role;

        // melakukan pembuatan konstrutor menggunakan method spesial
        // public function __construct(  ) // method construct tanpa variable parameter
        // {
        //     $this->id  = 2;
        //     $this->name  = "Asep";
        //     $this->email  = "user@example.com";
        //     $this->address  = "Bandung";
        //     $this->role  = "user";
        // }

        public function __construct(
            $id = 2, $name = "test user", $email = "testUser@example.com", 
                $address = "batam", $role = "user") {
                $this->id  = $id;
                $this->name  = $name;
                $this->email  = $email;
                $this->address  = $address;
                $this->role  = $role;
        }

    }

    // melakukan instansiasi class-objek
    $user1 = new User("1", "Hasudungan", "admin@example.com", "Batam", "admin");
    $user2 = new User();

    // melakukan koleksi data user kedalam variable array
    $listUser = [$user1, $user2];