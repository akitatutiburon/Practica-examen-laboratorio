<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="cesese.css">
    <title>Mascotas</title>
</head>
<body>



<?php
include 'conexion.php';

$registros_por_pagina = 5;


$consulta = "SELECT COUNT(*) as total FROM mascotas";
$resultado = mysqli_query($conn, $consulta);
$row = $resultado->fetch_assoc();
$total_registros = $row['total'];
//echo $total_registros;

// Calcula el número total de páginas
$total_paginas = ceil($total_registros / $registros_por_pagina);

$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$inicio = ($pagina_actual - 1) * $registros_por_pagina;


$consulta2 = "SELECT * FROM mascotas LIMIT $inicio, $registros_por_pagina";
$resultado2 = $conn->query($consulta2);


while ($row = $resultado2->fetch_assoc()) {

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
     echo "</tr>";



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
    echo "</tr>";

    echo "</table>";
    

}



// Muestra los enlaces de paginación
for ($i = 1; $i <= $total_paginas; $i++) {
    echo "<a href='?pagina=$i'>$i</a> ";
}


?>


    
</body>