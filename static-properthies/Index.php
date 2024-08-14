<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Static propherthies</title>
</head>
<body>
    <?php
        class ParentClass 
        {
            // deklarasi properti global
            public static $judul = " hy, saya properti static dari" . __CLASS__;

            public static function display()
            {
                echo self::$judul;
            }
        }

        class ChildClass extends ParentClass
        {
            public static $judul = " hy, saya properti static dari" . __CLASS__;

            public static function display()
            {
                echo parent::display();
            }

            public static function displayFromChild()
            {
                echo self::display();
            }
        }

        $obj = new ParentClass;
        $obj2 = new ChildClass;
    ?>
    <h1><?php echo ChildClass::displayFromChild(); ?> </h1>
</body>
</html>