<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        class ParentClass
        {
            public static $title = "hay, i'm properthies from" . __CLASS__;

            public function display()
            {
                echo self::$title;
            }

            public function __construct()
            {
                echo $this->display();
            }
        }

        class ChildClass extends ParentClass
        {
            public static $title = "hay, i'm properthies from" . __CLASS__;
            
            public function __construct()
            {
                echo parent::display();
            }
        }


        // $parent = new ParentClass;
    ?>    
    <h1> <?php new ChildClass ?> </h1>
</body>
</html>