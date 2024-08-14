<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class-object</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Belajar Class Objek</h1>
    <?php 
        // melakukan registrasi / pemangggilan class User
        require 'User.php';
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
                <?php foreach ($dataUsers as $key => $user): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $user->user_name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->address; ?></td>
                        <td><?php echo $user->role; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

</body>
</html>