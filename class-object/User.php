<?php 
        // melakukan pembuatan class
        class User {

            // melakukan registrasi properti
            public $id, $user_name, $email, $address, $role;
        }

        // melakukan instansiasi class-objek
        $user1  = new User();
        $user2  = new User();

        $user1->id = 1;
        $user1->user_name = "Hasudungan";
        $user1->email = "example@example.com";
        $user1->address = "Bandung-Barat";
        $user1->role = "admin";
    

        $user2->id = 2;
        $user2->user_name = "Asep";
        $user2->email = "asep@example.com";
        $user2->address = "Batam";
        $user2->role = "user";

        $dataUsers = [$user1, $user2];