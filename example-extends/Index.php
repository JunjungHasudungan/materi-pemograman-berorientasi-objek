<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Pewarisan</title>
</head>
<body>
    <?php
        class OrangTua
        {
            public $className;

            public function __construct()
            {
                $this->className = 'ini class ' . __CLASS__;
            }

            public function display()
            {
                return $this->className;
            }
        }

        class Anak extends OrangTua {
            // hampa
        }

        $orangTua = new OrangTua();

        $anak = new Anak();
    ?>
    <h1> <?php echo $anak->display(); ?> </h1>
</body>
</html>