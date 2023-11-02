<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="cesese.css">
    <!-- Imagen de Chimuelo 
        <img src="chimuelo.jfif" alt="Chimuelo"> 
    -->
    <title>Lista de Mascotas Disponibles</title>
    <script src="popup_eliminar_registro.js"></script>


</head>
<body>
    <h1>Lista de Mascotas Disponibles</h1>


<?php
include 'conexion.php';

// Consulta de todos los registros de la tabla "mascotas_disponibles"
$sql = "SELECT * FROM mascotas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los registros en una tabla
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Raza</th>
    <th>Edad</th>
    <th>Especie</th>
    <th>Género</th>
    <th>Precio</th>
    <th>Imágenes</th>
    <th>Borrar</th>
    <th>Editar</th>
    </tr>";
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
        // Codigo de IA para usar botón de eliminado
        
        // No funciona el JavaScript 
    echo "<td>" . "
    <a class='boton_borrar' href='eliminar_registro.php?id=" . $row['id_mascota'] . "'>
    Borrar</a>" . "
    </td>";
       
       // echo "<td>" . "<button onclick='confirmarEliminacion()' class='boton_popup_confirm' >Botón eliminar registro</button>" . "</td>";
        
        
        echo "<td>". "Botón epico de editar"."</td>";
        
        echo "</td>";

        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros en la tabla.";
}
include 'cerrar_conexion.php';

?>
</body>
</html>