<!DOCTYPE html>
<html>
<head>
    <title>Lista de Mascotas Disponibles</title>
</head>
<body>
    <h1>Lista de Mascotas Disponibles</h1>

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
    $sql = "SELECT * FROM mascotas_disponibles";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los registros en una tabla
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Raza</th><th>Edad</th><th>especie</th><th>genero</th><th>precio</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["nombre"]."</td>";
            echo "<td>".$row["raza"]."</td>";
            echo "<td>".$row["edad"]."</td>";
            echo "<td>".$row["especie"]."</td>";
            echo "<td>".$row["genero"]."</td>";
            echo "<td>".$row["precio"]."</td>";
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