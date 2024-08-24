<?php

require_once 'ChildClass.php';

// Contoh membuat beberapa objek ChildClass
$users = [
    new ChildClass(1, "John Doe", "john.doe@example.com", "123 Main St", "Admin", 81245546776),
    new ChildClass(2, "Jane Smith", "jane.smith@example.com", "456 Elm St", "User", 81245546776),
    new ChildClass(3, "Alice Johnson", "alice.johnson@example.com", "789 Maple St", "Moderator", 81245546776),
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No Handphone</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key => $user): ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->address; ?></td>
                    <td><?php echo $user->phoneNumber; ?></td>
                    <td><?php echo $user->role; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
