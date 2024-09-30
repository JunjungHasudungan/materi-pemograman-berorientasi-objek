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

        require_once __DIR__ . '/autoload.php';
        use App\Helper\Role;
        use App\Models\User;
        use App\Controllers\UserController;

        session_start(); 

        $users = User::all();
        foreach ($users as $key => $user) {
            $name = $user['name'];
            $email = $user['email'];
            $address = $user['address'];
            $role = $user['role'];
            $userId = $user['id'];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new UserController())->update();
        }

    ?>
    <div class="card">
        <h2>UPDATE</h2>
        <form 
            action="" 
            method="post" 
        >
            <input 
                type="hidden" 
                name="id" 
                value="<?= htmlspecialchars($userId); ?>"
            >
            <input 
                type="text" 
                name="name" 
                value="<?= htmlspecialchars($name); ?>"  
                placeholder="Name" 
                required
            >
            <input 
                type="email" 
                name="email" 
                placeholder="Email" 
                value="<?= htmlspecialchars($email); ?>"
                required
            >
            <input 
                type="text" 
                name="address" 
                value="<?= htmlspecialchars($address); ?>"
                placeholder="Address" 
                required
            >
            <select 
                name="role" 
                id="role" 
                required
            >
                <?php foreach (Role::roles as $key => $value) : ?>
                    <option value="<?= $value ?>" <?= ($value === $role) ? 'selected' : '' ?> ><?= $key ?></option>
                <?php endforeach; ?>
            </select><br><br>
            <div style="display: flex; margin-top: 10px; gap: 10px;">
                <input 
                    type="submit" 
                    id="submit-edit" 
                    name="update" 
                    value="UPDATE"
                >
                <input 
                    type="button" 
                    id="btn-back-edit" 
                    value="KEMBALI" 
                    onclick="window.location.href='index.php';"
                >
            </div>
        </form>
    </div>
</body>
</html>