<?php
    class User {
        public $id, $name, $email, $address, $role;  // melakukan registrasi properti yang dibutuhkan

        public function __construct($id, $name, $email, $address, $role= "user")  { 
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->address = $address;
            $this->role = $role;
        } 
    }
        // $listUser = [  // membuat array 2 dimensi sebagai tempat memberi nilai list dataUser
        //     [
        //         'id'        => 1,
        //         'name'      => 'Hasudungan',
        //         'email'     => 'admin@example.com',
        //         'address'   => 'Batam',
        //         'role'      => 'admin'
        //     ],
        //     [
        //         'id'        => 2,
        //         'name'      => 'Asep',
        //         'email'     => 'testUser@example.com',
        //         'address'   => 'Bandung',
        //         'role'      => 'user'
        //     ],
        // ];
        // pengisian nilai kedalam inisialisasi class objek
        // $users = [];
        // foreach ($listUser as $data) { // menggunkan konsep imperative
        //     $users = new User($data);
        // }

        // $users = array_map(function($data){  // menggunakan konsep deklarative
        //     return new User($data);
        // }, $listUser);

    // // // melakukan instansiasi class-objek
    // $user1 = new User("1", "Hasudungan", "admin@example.com", "Batam", "admin");
    // $user2 = new User("2", "Asep", "testUser@example.com", "Bandung");

    // // // melakukan koleksi data user kedalam variable array
    // $users = [$user1, $user2];