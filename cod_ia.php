<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="cesese.css">
    <!-- Imagen de Chimuelo 
        <img src="chimuelo.jfif" alt="Chimuelo"> 
    -->
    <title>Lista de Mascotas Disponibles</title>
</head>
<body>
    <h1>Lista de Mascotas Disponibles</h1>

    <form action="eliminar_registro.php" method="post">
        <input type="hidden" name="id_registro" value="2">
        <input type="submit" value="Eliminar">
    </form>



<?php

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tienda_mascotas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Consulta de todos los registros de la tabla "mascotas_disponibles"
    $sql = "SELECT * FROM mascotas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los registros en una tabla
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Raza</th><th>Edad</th><th>Especie</th><th>Género</th><th>Precio</th><th>Imágenes</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id_mascota"]."</td>";
            echo "<td>".$row["nombre"]."</td>";
            echo "<td>".$row["raza"]."</td>";
            echo "<td>".$row["edad"]."</td>";
            echo "<td>".$row["especie"]."</td>";
            echo "<td>".$row["genero"]."</td>";
            echo "<td>".$row["precio"]."</td>";
            echo "<td>";
            if($row["imagen"] == 0){
                echo "No hay imágen disponible";
            //Probar para que salga automaticamente ¿?
            //} else {
            //    echo "<img src="chimuelo.jfif" alt="Chimuelo">"; 
            }
            echo "<td>" . "<a href='eliminar_registro.php?=".$row['id']. "'><button class= boton_borrar>Borrar</button></a>". "</td>"; 
            ?>

            <html>
            <a href="eliminar_registro.php".<?php echo $row['id']; ?>>
                <button>Botón</button>
            </a>

            </html>

            <?php
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron registros en la tabla.";
    }



    // Cerrar la conexión
    $conn->close();
    ?>
</body>
</html>