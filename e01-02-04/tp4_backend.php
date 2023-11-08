<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Ejercicio Arrays</title>
</head>
<body>
    <h1>Ejercicio Arrays</h1>

    <!-- Crear un archivo “tp4_backend.php” y realizar los siguientes ejercicios:
    
    1. Almacenar en un array los 10 primeros números pares y mostrar en pantalla uno debajo del otro. -->
    <p>1)</p>
    <?php
        $primerosPares = [];

        for ($i = 2; count($primerosPares) < 10; $i += 2) {
            $primerosPares[] = $i;
        }
        
        foreach ($primerosPares as $item) {
            echo "$item<br>";
        }
    ?>

    <!-- 2. Crear un array e introducir los siguientes valores: Pedro, Ana, 34 y 1, sin asignar el índice de la matriz. Mostrar el esquema del array con print_r(). -->

    <p>2)</p>
    <?php
        $nuevoArray = [];
        
        $nuevoArray[] = "Pedro";
        $nuevoArray[] = "Ana";
        $nuevoArray[] = "34";
        $nuevoArray[] = "1";

        print_r($nuevoArray);
    ?>

    <!-- 3. Crear un array asociativo e introducir los siguientes valores:
    Nombre: Pedro
    Apellido: Torres
    Dirección: Av. Mayor 3703
    Teléfono: 1122334455 -->

    <p>3)</p>
    <?php
        $contacto = [];

        $contacto['Nombre'] = 'Pedro';
        $contacto['Apellido'] = 'Torres';
        $contacto['Direccion'] = 'Av. Mayor 3703';
        $contacto['Telefono'] = 1122334455;

        print_r($contacto);
    ?>

    <!-- 4. Crear un array introduciendo las ciudades: Madrid, Barcelona, Londres, New York, Los Ángeles y Chicago, sin asignar índices al array. A continuación, muestra el contenido del array. Ejemplo: La ciudad con el índice 0 tiene el nombre Madrid. -->

    <p>4)</p>
    <?php
        $ciudades[] = 'Madrid';
        $ciudades[] = 'Barcelona';
        $ciudades[] = 'Londres';
        $ciudades[] = 'New York';
        $ciudades[] = 'Los Angeles';
        $ciudades[] = 'Chicago';

        foreach ($ciudades as $indice => $ciudad) {
            echo "La ciudad con el índice $indice tiene el nombre $ciudad<br>";
        }
    ?>

    <!-- 5. Repite el ejercicio anterior pero ahora se ha de crear índices, MD para Madrid, BCL para Barcelona, LD para Londres, NY para New York, LA para Los Ángeles y CCG para Chicago. Ejemplo: El índice de Madrid es MD. -->
    
    <p>5)</p>
    <?php
        $ciudadesAsoc['MD'] = 'Madrid';
        $ciudadesAsoc['BCL'] = 'Barcelona';
        $ciudadesAsoc['LD'] = 'Londres';
        $ciudadesAsoc['NY'] = 'New York';
        $ciudadesAsoc['LA'] = 'Los Angeles';
        $ciudadesAsoc['CCG'] = 'Chicago';

        foreach ($ciudadesAsoc as $indiceAsoc => $ciudadAsoc) {
            echo "El código de $ciudadAsoc es $indiceAsoc<br>";
        }
    ?>
</body>
</html>