<?php
    // pembuatan class 
    class User {
    
        // melakukan registrasi properti yang dibutuhkan
        public $id, $name, $email, $address, $role;

        // melakukan pembuatan konstrutor menggunakan method spesial
        public function __construct(  )
        {
            $this->id  = 2;
            $this->name  = "Asep";
            $this->email  = "user@example.com";
            $this->address  = "Bandung";
            $this->role  = "user";
        }
    }

    // melakukan instansiasi class-objek
    $user1 = new User();
    $user2 = new User();

    // melakukan koleksi data user kedalam variable array
    $listUser = [$user1, $user2];