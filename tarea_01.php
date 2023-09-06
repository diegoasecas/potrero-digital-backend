<!DOCTYPE html>
<html>
    <head>
        <title>Potrero Digital - Tarea Nº 1</title>
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

            echo "4)";
            
            $gradosCentigrados = 20;
            $gradosFahrenheit = ($gradosCentigrados * (9 / 5)) + 32;
            echo "<p>$gradosCentigrados grados centígrados = $gradosFahrenheit grados fahrenheit</p>";
            
            echo "5)";
            
            $rectBase = 18;
            $rectAltura = 12;
            $perimetroRect = 2 * $rectAltura + 2 * $rectBase;
            $areaRect = $rectAltura * $rectBase;

            echo "<p>El perímetro de un rectángulo de base 18 cm y altura 12 cm es de $perimetroRect cm, y su área es de $areaRect cm²</p>";
            
            $pi  = M_PI;
            $circRadio = 30;
            $perimetroCirc = (2 * $circRadio) * $pi;
            $areaCirc = $pi * $circRadio ** 2;
            
            echo "<p>El perímetro de un círculo de radio 30 cm es de $perimetroCirc cm, y su área es de $areaCirc cm²</p>";
        ?>
    </body>
</html>