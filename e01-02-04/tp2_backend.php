<!DOCTYPE html>
<html lang= "en">
<head>
    <meta charset= "UTF-8">
    <meta name= "viewport" content= "width=device-width, initial-scale=1.0">
    <title>Trabajo Práctico N° 3</title>
</head>
<body>
    <?php
        $n_1 = 3;
        echo "<strong>\$n_1 = $n_1</strong>";
        
        if ($n_1 > 0) {
            echo "<p>$n_1 es un número positivo</p>";
        } elseif ($n_1 < 0) {
            echo "<p>$n_1 es un número negativo</p>";
        } else {
            echo "<p>$n_1 no es ni positivo ni negativo</p>";
        }

        $n_2 = -7;
        echo "<strong>\$n_2 = $n_2</strong>";
        
        if ($n_2 > 0) {
            echo "<p>$n_2 es un número positivo</p>";
        } elseif ($n_2 < 0) {
            echo "<p>$n_2 es un número negativo</p>";
        } else {
            echo "<p>$n_2 no es ni positivo ni negativo</p>";
        }

        $n_3 = 0;
        echo "<strong>\$n_3 = $n_3</strong>";
        
        if ($n_3 > 0) {
            echo "<p>$n_3 es un número positivo</p>";
        } elseif ($n_3 < 0) {
            echo "<p>$n_3 es un número negativo</p>";
        } else {
            echo "<p>$n_3 no es ni positivo ni negativo</p>";
        }

        echo "<hr />";

        $n_4 = 5;
        echo "<strong>\$n_4 = $n_4</strong>";
        
        if ($n_4 > 10 || $n_4 < 2) {
            echo "<p>$n_4 es mayor que 10 <strong>o</strong> menor que 2</p>";
        } else {
            echo "<p>$n_4 no es <strong>ni</strong> mayor que 10 <strong>ni</strong> menor que 2</p>";
        }

        $n_5 = 1;
        echo "<strong>\$n_5 = $n_5</strong>";
        
        if ($n_5 > 10 || $n_5 < 2) {
            echo "<p>$n_5 es mayor que 10 <strong>o</strong> menor que 2</p>";
        } else {
            echo "<p>$n_5 no es <strong>ni</strong> mayor que 10 <strong>ni</strong> menor que 2</p>";
        }

        $n_6 = 13;
        echo "<strong>\$n_6 = $n_6</strong>";
        
        if ($n_6 > 10 || $n_6 < 2) {
            echo "<p>$n_6 es mayor que 10 <strong>o</strong> menor que 2</p>";
        } else {
            echo "<p>$n_6 no es <strong>ni</strong> mayor que 10 <strong>ni</strong> menor que 2</p>";
        }

        echo "<hr />";

        $numero_1 = 3;
        $numero_2 = 7;
        echo "<strong>\$numero_1 = $numero_1; \$numero_2 = $numero_2</strong>";
        
        if ($numero_1 == $numero_2) {
            echo "los números ingresados son iguales";
        } elseif ($numero_1 > $numero_2) {
            echo "<p>$numero_1 mas $numero_2 = ";
            echo $numero_1 + $numero_2;
            echo "</p>";

            echo "<p>$numero_1 menos $numero_2 = ";
            echo $numero_1 - $numero_2;
            echo "</p>";
        } else {
            echo "<p>el producto de $numero_1 por $numero_2 = ";
            echo $numero_1 * $numero_2;
            echo "</p>";

            echo "<p>$numero_1 dividido $numero_2 = ";
            echo intdiv($numero_1, $numero_2);
            echo "</p>";

            echo "<p>el resto de dividir $numero_1 por $numero_2 = ";
            echo $numero_1 % $numero_2;
            echo "</p>";
        }

        $numero_3 = 9;
        $numero_4 = 4;
        echo "<strong>\$numero_3 = $numero_3; \$numero_4 = $numero_4</strong>";
        
        if ($numero_3 == $numero_4) {
            echo "los números ingresados son iguales";
        } elseif ($numero_3 > $numero_4) {
            echo "<p>$numero_3 mas $numero_4 = ";
            echo $numero_3 + $numero_4;
            echo "</p>";

            echo "<p>$numero_3 menos $numero_4 = ";
            echo $numero_3 - $numero_4;
            echo "</p>";
        } else {
            echo "<p>el producto de $numero_3 por $numero_4 = ";
            echo $numero_3 * $numero_4;
            echo "</p>";

            echo "<p>$numero_3 dividido $numero_4 = ";
            echo intdiv($numero_3, $numero_4);
            echo "</p>";

            echo "<p>el resto de dividir $numero_3 por $numero_4 = ";
            echo $numero_3 % $numero_4;
            echo "</p>";
        }

        $numero_5 = 7;
        $numero_6 = 7;
        echo "<strong>\$numero_5 = $numero_5; \$numero_6 = $numero_6</strong>";
        
        if ($numero_5 == $numero_6) {
            echo "<p>los números ingresados son iguales</p>";
        } elseif ($numero_5 > $numero_6) {
            echo "<p>$numero_5 mas $numero_6 = ";
            echo $numero_5 + $numero_6;
            echo "</p>";

            echo "<p>$numero_5 menos $numero_6 = ";
            echo $numero_5 - $numero_6;
            echo "</p>";
        } else {
            echo "<p>el producto de $numero_5 por $numero_6 = ";
            echo $numero_5 * $numero_6;
            echo "</p>";

            echo "<p>$numero_5 dividido $numero_6 = ";
            echo intdiv($numero_5, $numero_6);
            echo "</p>";

            echo "<p>el resto de dividir $numero_5 por $numero_6 = ";
            echo $numero_5 % $numero_6;
            echo "</p>";
        }
    ?>
</body>
</html>