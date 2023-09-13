<!DOCTYPE html>
<html lang= "en">
<head>
    <meta charset= "UTF-8">
    <meta name= "viewport" content= "width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $n_1 = 3;
        echo "<strong>\$n_1 = 3</strong>";
        
        if ($n_1 > 0) {
            echo "<p>$n_1 es un número positivo</p>";
        } elseif ($n_1 < 0) {
            echo "<p>$n_1 es un número negativo</p>";
        } else {
            echo "<p>$n_1 no es ni positivo ni negativo</p>";
        }

        $n_2 = -7;
        echo "<strong>\$n_2 = -7</strong>";
        
        if ($n_2 > 0) {
            echo "<p>$n_2 es un número positivo</p>";
        } elseif ($n_2 < 0) {
            echo "<p>$n_2 es un número negativo</p>";
        } else {
            echo "<p>$n_2 no es ni positivo ni negativo</p>";
        }

        $n_3 = 0;
        echo "<strong>\$n_3 = 0</strong>";
        
        if ($n_3 > 0) {
            echo "<p>$n_3 es un número positivo</p>";
        } elseif ($n_3 < 0) {
            echo "<p>$n_3 es un número negativo</p>";
        } else {
            echo "<p>$n_3 no es ni positivo ni negativo</p>";
        }

        echo "<hr />";

        $n_4 = 5;
        echo "<strong>\$n_4 = 5</strong>";
        
        if ($n_4 > 10 || $n_4 < 2) {
            echo "<p>$n_4 es mayor que 10 <strong>o</strong> menor que 2</p>";
        } else {
            echo "<p>$n_4 no es <strong>ni</strong> mayor que 10 <strong>ni</strong> menor que 2</p>";
        }

        $n_5 = 1;
        echo "<strong>\$n_5 = 1</strong>";
        
        if ($n_5 > 10 || $n_5 < 2) {
            echo "<p>$n_5 es mayor que 10 <strong>o</strong> menor que 2</p>";
        } else {
            echo "<p>$n_5 no es <strong>ni</strong> mayor que 10 <strong>ni</strong> menor que 2</p>";
        }

        $n_6 = 13;
        echo "<strong>\$n_6 = 13</strong>";
        
        if ($n_6 > 10 || $n_6 < 2) {
            echo "<p>$n_6 es mayor que 10 <strong>o</strong> menor que 2</p>";
        } else {
            echo "<p>$n_6 no es <strong>ni</strong> mayor que 10 <strong>ni</strong> menor que 2</p>";
        }

        echo "<hr />";

        $numero_1 = 3;
        $numero_2 = 7;
        echo "<strong>\$numero_1 = 3, \$numero_2 = 7</strong>";
        
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
        echo "<strong>\$numero_3 = 9; \$numero_4 = 4</strong>";
        
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
/* 

        
3. Crear una variable n y validar que sea un número mayor a 10 o menor a 2.
4. Crear dos variables, una con nombre numero1 y otra con el nombre de numero2. Si numero1 es
mayor a numero2, mostrar por pantalla, la suma y la resta. Si numero2 es mayor a numero1,
mostrar por pantalla la multiplicación, la división entera y el resto de la división. Si numero

 */

    ?>
</body>
</html>