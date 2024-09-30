<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="assets/css/style.css"/>  
    <script src="assets/js/helper.js"></script>
</head>
<body>
    <?php 

        require_once 'App/init.php';
        use App\Helper\Role;
        use App\Models\User;

        session_start(); 

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $role = $_POST['role'];
            $user = new User(null, $name, $email, $address, $role);
            $user->register();
        }

        $users = User::all();

        if (isset($_GET['delete_id'])) {
            $deleteId = $_GET['delete_id'];
            User::deleteById('users', $deleteId);
            $_SESSION['success_message'] = "Berhasil melakukan penghapusan data user";
            header("Location: index.php");
            exit();
        }
    ?>
    <div class="card">
        <h2>UPDATE</h2>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="address" placeholder="Address" required>
            <select name="role" id="role" required>
                <?php foreach (Role::roles as $key => $value) : ?>
                    <option value="<?= $value ?>"><?= $key ?></option>
                <?php endforeach; ?>
            </select><br><br>
            <input type="submit" name="update" value="UPDATE">
        </form>
    </div>
</body>
</html>