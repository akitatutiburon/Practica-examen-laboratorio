<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="cesese.css">
    <title>Productos</title>


</head>
<body>
    <header>
        <h1>Lista de Productos</h1>
    </header>
    <nav>
        <ul>
            <li><a href="../Mascotas/pag_principal.php">Mascotas</a></li>
            <li><a href="../Productos/pag_principal.php">Productos</a></li>
            <li><a href="../Adopciones/adopciones.php">Adopciones</a></li>
            <li><a href="../Clientes/clientes.php">Clientes</a></li>
            <li><a href="../Mi_cuenta/pag_principal.php">Mi cuenta</a></li>
        </ul>
    </nav>
<?php
include "conexion.php";

$sql = "SELECT * FROM mascotas";
//$error = isset($_GET['nombre_busqueda'] && $_GET['categoria_busqueda']);

if (isset($_GET['nombre_busqueda']) && $_GET['categoria_busqueda']) {
    $termino_busqueda = $_GET['nombre_busqueda'];
    $categoria_busqueda = $_GET['categoria_busqueda'];
    
    $sql = "SELECT * FROM mascotas WHERE $categoria_busqueda LIKE '%$termino_busqueda%'";
}
$resultado = mysqli_query($conn, $sql);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Mostrar los resultados
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
    <th>Estado legal de la mascota</th>
    </tr>";
    

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>";
        if ($fila['id_mascota']== ""){
            echo "Error en ingreso de datos en base de datos";
        } else {
            echo $fila['id_mascota'];
        }
        echo "</td>";
        echo "<td>";
        if ($fila['nombre']== ""){
            echo "Error en ingreso de datos en base de datos";
        } else {
            echo $fila['nombre'];
        }
        echo "</td>";
        echo "<td>";
        if ($fila['raza']== ""){
            echo "Error en ingreso de datos en base de datos";
        } else {
            echo $fila['raza'];
        }
        echo "</td>";
        echo "<td>";
        if ($fila['edad']== ""){
            echo "Error en ingreso de datos en base de datos";
        } else {
            echo $fila['edad'];
        }
        echo "</td>";
        echo "<td>";
        if ($fila['especie']== ""){
            echo "Error en ingreso de datos en base de datos";
        } else {
            echo $fila['especie'];
        }
        echo "</td>";
        echo "<td>";
        switch ($fila["genero"]){
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
        echo "<td>";
        if ($fila['precio'] == "0.00"){
            echo "Error en ingreso de datos en base de datos";
        } else {
            echo $fila['precio'];
        }
        echo "</td>";
        echo "<td>";
        if($fila["imagen"] == 0){
            echo "No hay imágen disponible";
        }
        echo "</td>";
        echo "<td>";
        switch ($fila['estado_salud']){
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
        echo "<td>";
        if ($fila['descripcion']== ""){
            echo "Error en ingreso de datos en base de datos";
        } else {
            echo $fila['descripcion'];
        }
        echo "</td>";
        echo "<td>";
        switch ($fila['estado_legal_mascota']){
            case 1:
                if ($fila["genero"] == 1){
                    echo 'Adoptado';
                    break;    
                } elseif ($fila["genero"] == 2) {
                    echo 'Adoptada';
                    break;
                } else {
                    echo "Error en ingreso de datos en base de datos";
                break;
                }
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
    }
} else {
    echo "No se encontraron resultados.";
}
?>



</body>
</html>