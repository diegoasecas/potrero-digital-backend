<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
        <?php
            echo "1)";
            echo "<p>Hola Mundo</p>";
            
            echo "2)";
            $holaMundo = "<p>Hola Mundo !!!</p>";
            echo $holaMundo;
            
            echo "3)";
            $int_a = 7;
            $int_b = 5;
            echo "<p>$int_a + $int_b = ";
            echo $int_a + $int_b;
            echo "</p>";
            
            echo "<p>$int_a - $int_b = ";
            echo $int_a - $int_b;
            echo "</p>";

            echo "<p>$int_a * $int_b = ";
            echo $int_a * $int_b;
            echo "</p>";

            echo "<p>$int_a / $int_b = ";
            echo $int_a / $int_b;
            echo "</p>";

            echo "<p>$int_a % $int_b = ";
            echo $int_a % $int_b;
            echo "</p>";
            
        ?>
    </body>
</html>