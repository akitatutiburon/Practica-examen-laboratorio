<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../cesese.css">
    <title>Mascotas</title>
</head>
<body>
    <!-- <h1>Lista de Mascotas</h1> -->

    <header>
        <h1>Lista de Mascotas</h1>
    </header>
    <nav>
        <ul>
            <li><a href="http://localhost/Practica-examen-laboratorio/Mascotas/pag_principal.php">Mascotas</a></li>
            <li><a href="http://localhost/Practica-examen-laboratorio/Productos/pag_principal.php">Productos</a></li>
            <li><a href="http://localhost/Practica-examen-laboratorio/Adopciones/adopciones.php">Adopciones</a></li>
            <li><a href="http://localhost/Practica-examen-laboratorio/Clientes/clientes.php">Clientes</a></li>
        </ul>
    </nav>

<?php
include '../conexion.php';
session_start();
$rol_usuario = $_SESSION['rol_usuario'];

// Consulta de todos los registros de la tabla "mascotas_disponibles"
$sql = "SELECT * FROM mascotas";
$result = $conn->query($sql);

// Para la parte de filtrar datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Recibir datos de formulario de datos cambiados (cambiar_datos_registro.php)
    $columna_filtrar = $_POST["columna_filtrar"];
    $forma_filtrar = $_POST["forma_filtrar"];
    $sql = "SELECT * FROM mascotas ORDER BY $columna_filtrar $forma_filtrar";
    $result = $conn->query($sql);
}

include 'filtrar_datos.php';
if ($result->num_rows > 0) {
    // Titulos de los atributos
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Raza</th>
    <th>Edad</th>
    <th>Especie</th>
    <th>Género</th>
    <th>Precio</th>
    <th>Imágen</th>
    <th>Estado de salud</th>
    <th>Descripcion</th>
    <th>Estado legal de la mascota</th>";
    if ($rol_usuario == 1){
        echo "<th>Borrar</th>
        <th>Editar</th>";
    }
    
    echo "</tr>";

    // Mostrar los registros en una tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";

        //echo "<td>".$row["id_mascota"]."</td>";
        echo "<td>";
        if ($row['id_mascota']== ""){
            echo "Error en ingreso de datos en base de datos";
            
            } else {
            echo $row['id_mascota'];
        }
        echo "</td>";

        //echo "<td>".$row["nombre"]."</td>";
        echo "<td>";
        if ($row['nombre']== ""){
            echo "Error en ingreso de datos en base de datos";
            
            } else {
            echo $row['nombre'];
        }
        echo "</td>";

        //echo "<td>".$row["raza"]."</td>";
        echo "<td>";
        if ($row['raza']== ""){
            echo "Error en ingreso de datos en base de datos";
            
            } else {
            echo $row['raza'];
        }
        echo "</td>";

        //echo "<td>".$row["edad"]."</td>";
        echo "<td>";
        if ($row['edad']== ""){
            echo "Error en ingreso de datos en base de datos";
            
            } else {
            echo $row['edad'];
        }
        echo "</td>";

        //echo "<td>".$row["especie"]."</td>";
        echo "<td>";
        if ($row['especie']== ""){
            echo "Error en ingreso de datos en base de datos";
            
            } else {
            echo $row['especie'];
        }
        echo "</td>";

        //echo "<td>".$row["genero"]."</td>";
        echo "<td>";
        switch ($row["genero"]){
            case 1:
                echo "Macho";
                break;
            case 2:
                echo "Hembra";
                break;
            default:
                echo "Error en ingreso de datos en base de datos";
                break;
        }
        echo "</td>";

        //echo "<td>".$row["precio"]."</td>";
        echo "<td>";
        if ($row['precio'] == "0.00"){
            echo "Error en ingreso de datos en base de datos";
            
            } else {
            echo $row['precio'];
        }
        echo "</td>";

        //echo "<td>".$row["imagen"]."</td>";
        echo "<td>";
        if($row["imagen"] == 0){
            echo "No hay imágen disponible";
            //Probar para que salga automaticamente ¿?
        //} else {
            //echo "<img src='../imagenes/chimuelo.jfif' alt='Chimuelo'>"; 
        }
        echo "</td>";

        //echo "<td>".$row["estado_salud"]."</td>";
        echo "<td>";
        switch ($row['estado_salud']){
            case 1:
                echo 'Sano';
                break;
            case 2:
                echo 'Débil';
                break;
            case 3:
                echo 'Enfermo';
                break;
            case 4:
                echo 'Muerto';
                break;
            case 5:
                echo 'En rehabilitación';
                break;
            case 6:
                echo 'En cuidados intensivos';
                break;
            default:
                echo "Error en ingreso de datos en base de datos";
                break;
        }
        echo "</td>";
        
        //echo "<td>".$row["descripcion"]."</td>";
        echo "<td>";
        if ($row['descripcion']== ""){
            echo "Error en ingreso de datos en base de datos";
            
        } else {
            echo $row['descripcion'];
        }
        echo "</td>";

        //echo "<td>".$row["estado_legal_mascota"]."</td>";
        echo "<td>";
        switch ($row['estado_legal_mascota']){
            case 1:
                // Por si es macho o hembra xd
                if ($row["genero"] == 1){
                    echo 'Adoptado';
                    break;    
                } elseif ($row["genero"] == 2) {
                    echo 'Adoptada';
                    break;
                } else {
                    echo "Error en ingreso de datos en base de datos";
                break;
                }
                // echo 'Adoptada';
                // break;
            case 2:
                echo 'En proceso de adopcion';
                break;
            case 3:
                echo 'Pendiente de adopción';
                break;
            default:
                echo "Error en ingreso de datos en base de datos";
                break;
        }
        echo "</td>";
        

        if ($rol_usuario == 1){
           // Botón de borrar
            echo "<td>" . "
            <a class='boton_borrar' href='eliminar_registro.php?id=" . $row['id_mascota'] . "'>Borrar</a>" . "
            </td>";

            // Botón de editar
            echo "<td>" . "
            <a class='boton_editar' href='cambiar_datos_registro.php?id=" . $row['id_mascota'] . "'>Editar</a>" . "
            </td>";
        }
        
        // <--- Fin de Tablas --->
        echo "</td>";

        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros en la tabla.";
}


if ($rol_usuario == 1){
    //<---  Colocar botón de formulario de añadir registros --->
    include 'formulario_agregar_registros.php';
}


include '../cerrar_conexion.php';
?>



</body>
</html>