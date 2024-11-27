<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BELAJAR CONSTRUCTOR</title>
</head>
<body>
    <h1>DATA USER</h1>
    <?php 
        // memanggil / menggunakan class User.php
        require 'User.php';

        // melakukan instansiasi class-objek
        $user = new User(2, "arief", "arief@example.com", "bandung", "admin");

        // memberi nilai / assignment value
        $user->id = 2;
        $user->name = "arief";
        $user->email = "arief@example.com";
        $user->address = "bandung";
        $user->role = "admin";
    ?>
    <ul>
        <li> <?php echo $user->id; ?></li>
        <li><?php echo $user->name; ?></li>
        <li><?php echo $user->email; ?></li>
        <li><?php echo $user->address; ?></li>
        <li><?php echo $user->role; ?></li>
    </ul>
</body>
</html>