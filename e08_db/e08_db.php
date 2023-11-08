<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Potrero Digital Backend - Ejercicio N° 8</title>
    </head>

    <body>
        <h1>Ejercicio N° 8 - PHP y Bases de datos</h1>
        
        <h2>Lista de ropa</h2>
        
        <?php
            // conexion
            $connection = mysqli_connect("127.0.0.1", "root", "databased69");
            mysqli_select_db($connection, "tienda");

            echo "<h3>Listar todos los registros</h3>";
            // orden SQL
            $query_1 = 'SELECT * FROM ropa';

            // ejecutar la orden y obtener los registros
            $data_1 = mysqli_query($connection, $query_1);
            
            
            // recorrer los registros segun condicion
            while ($reg_1 = mysqli_fetch_array($data_1)) {
                ?>

                <?php echo ucwords($reg_1['prenda']); ?>
                <?php echo ucwords($reg_1['marca']); ?>
                <?php echo $reg_1['precio']; ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($reg_1['imagen']); ?>" alt="Image">
                <br />
                <?php }
        ?>

        <?php // orden SQL
            echo "<h3>Listar todos los registros cuyo tipo de prenda sea 'Buzo'</h3>";
            $query_2 = 'SELECT * FROM ropa WHERE prenda = "Buzo"';

            // ejecutar la orden y obtener los registros
            $data_2 = mysqli_query($connection, $query_2);
            
            
            // recorrer los registros segun condicion
            while ($reg_2 = mysqli_fetch_array($data_2)) {
                ?>

                <?php echo ucwords($reg_2['prenda']); ?>
                <?php echo ucwords($reg_2['marca']); ?>
                <?php echo $reg_2['precio']; ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($reg_2['imagen']); ?>" alt="Image">
                <br />
                <?php }
        ?>

        <?php // orden SQL
            echo "<h3>Listar todos los registros cuya marca sea 'Nike'</h3>";
            $query_3 = 'SELECT * FROM ropa WHERE marca = "Nike"';

            // ejecutar la orden y obtener los registros
            $data_3 = mysqli_query($connection, $query_3);
            

            // recorrer los registros segun condicion
            while ($reg_3 = mysqli_fetch_array($data_3)) {
                ?>

                <?php echo ucwords($reg_3['prenda']); ?>
                <?php echo ucwords($reg_3['marca']); ?>
                <?php echo $reg_3['precio']; ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($reg_3['imagen']); ?>" alt="Image">
                <br />
                <?php }
        ?>

        <?php // orden SQL
            echo "<h3>Listar todos los registros cuyo precio sea mayor a 500</h3>";
            $query_4 = 'SELECT * FROM ropa WHERE precio > 500';

            // ejecutar la orden y obtener los registros
            $data_4 = mysqli_query($connection, $query_4);
            

            // recorrer los registros segun condicion
            while ($reg_4 = mysqli_fetch_array($data_4)) {
                ?>

                <?php echo ucwords($reg_4['prenda']); ?>
                <?php echo ucwords($reg_4['marca']); ?>
                <?php echo $reg_4['precio']; ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($reg_4['imagen']); ?>" alt="Image">
                <br />
                <?php }
        ?>

    </body>
</html>
