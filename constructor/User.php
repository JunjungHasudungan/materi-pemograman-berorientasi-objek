<?php
    class User {
        public $id, $name, $email, $address, $role;  // melakukan registrasi properti yang dibutuhkan

        public function __construct($dataUser = [])  {  // constructor dengan array kosong sebagai variable parameter
            $this->id = $dataUser['id'] ?? null;
            $this->name = $dataUser['name'] ?? null;
            $this->email = $dataUser['email'] ?? null;
            $this->address = $dataUser['address'] ?? null;
            $this->role = $dataUser['role'] ?? null;
        } 
    }
        $listUser = [  // membuat array 2 dimensi sebagai tempat memberi nilai list dataUser
            [
                'id'        => 1,
                'name'      => 'Hasudungan',
                'email'     => 'admin@example.com',
                'address'   => 'Batam',
                'role'      => 'admin'
            ],
            [
                'id'        => 2,
                'name'      => 'Asep',
                'email'     => 'testUser@example.com',
                'address'   => 'Bandung',
                'role'      => 'user'
            ],
        ];
        // pengisian nilai kedalam inisialisasi class objek
        // $users = [];
        // foreach ($listUser as $data) { // menggunkan konsep imperative
        //     $users = new User($data);
        // }

        $users = array_map(function($data){  // menggunakan konsep deklarative
            return new User($data);
        }, $listUser);

    // // melakukan instansiasi class-objek
    // $user1 = new User("1", "Hasudungan", "admin@example.com", "Batam", "admin");
    // $user2 = new User();

    // // melakukan koleksi data user kedalam variable array
    // $listUser = [$user1, $user2];