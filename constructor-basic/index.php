<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Konstruktor</title>
    <link rel ="stylesheet" href="style.css"/>  
</head>
<body>
    <h1>Belajar Constructor</h1>
    <?php
        // melakukan import class User
        require 'User.php';

    $user1 = new User("1", "Hasudungan", "admin@example.com", "Batam", "admin");
    $users = new User("2", "Asep", "testUser@example.com", "Bandung");

    $users = [$user1, $users];
    ?>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key => $user1): ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $user1->name; ?></td>
                    <td><?php echo $user1->email; ?></td>
                    <td><?php echo $user1->address; ?></td>
                    <td><?php echo $user1->role; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>