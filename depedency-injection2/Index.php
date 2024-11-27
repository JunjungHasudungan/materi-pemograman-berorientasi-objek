<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Depedency Injection</title>
</head>
<body>
    <?php
        class User
        {
            // properti global
            public $name, $email;


            public function __construct($name = '', $email = '')
            {
                $this->name = $name;
            }


            public static function create(array $data) 
            {
                $errors = [];
            }
        }
    ?>
</body>
</html>