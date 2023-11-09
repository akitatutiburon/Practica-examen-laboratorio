<?php
include 'conexion.php';


// Consulta para obtener todos los registros de la tabla "adopciones"
$regis_adopciones = "SELECT * FROM adopciones";
$result_adopciones = $conn->query($regis_adopciones);

// Consulta para obtener todos los registros de la tabla "Clientes"
$regis_clientes = "SELECT * FROM clientes";
$result_clientes = $conn->query($regis_clientes);

// Verificar si hay registros y mostrarlos en una tabla
if ($result_adopciones->num_rows > 0) {
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>id_cliente</th>
    <th>id_mascota</th>
    <th>fecha</th>
    <th>estado_legal_adopcion</th>
    </tr>";
    while ($row = $result_adopciones->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id_adopciones"] . "</td>
        <td>" . $row["id_cliente"] . "</td>
        <td>" . $row["id_mascota"] . "</td>
        <td>" . $row["fecha"] . "</td>
        <td>" . $row["estado_legal_adopcion"] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros en la tabla 'adopciones'.";
}

// if ($result_adopciones->num_rows > 0) {
//     // Mostrar los registros
//     while ($row = $result_adopciones->fetch_assoc()) {
//         echo "ID: " . $row["id_adopciones"] . "<br>";
//         echo "id_cliente: " . $row["id_cliente"] . "<br>";
//         echo "id_mascota: " . $row["id_mascota"] . "<br>";
//         echo "fecha: " . $row["fecha"] . "<br>";
//         echo "estado_legal_adopcion: " . $row["estado_legal_adopcion"] . "<br>";
//         // Agrega aquí los demás campos que deseas mostrar
//         echo "<br>";
//     }
//     echo "Fin de adopciones" . "<br>";
//     echo "<br>";
// } else {
//     echo "No se encontraron registros en la tabla adopciones.";
// }

if ($result_clientes->num_rows > 0) {
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Nombres</th>
    <th>apellidos</th>
    <th>numero_ci</th>
    <th>edad</th>
    <th>ingreso_bruto_mensual</th>
    </tr>";
    while ($row = $result_clientes->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id_cliente"] . "</td>
        <td>" . $row["nombres"] . "</td>
        <td>" . $row["apellidos"] . "</td>
        <td>" . $row["numero_ci"] . "</td>
        <td>" . $row["edad"] . "</td>
        <td>" . $row["ingreso_bruto_mensual"]. "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros en la tabla 'adopciones'.";
}




// if ($result_clientes->num_rows > 0) {
//     // Mostrar los registros
//     while ($row = $result_clientes->fetch_assoc()) {
//         echo "ID: " . $row["id_cliente"] . "<br>";
//         echo "Nombres: " . $row["nombres"] . "<br>";
//         echo "apellidos: " . $row["apellidos"] . "<br>";
//         echo "numero_ci: " . $row["numero_ci"] . "<br>";
//         echo "edad: " . $row["edad"] . "<br>";
//         echo "ingreso_bruto_mensual: " . $row["ingreso_bruto_mensual"] . "<br>";
//         // Agrega aquí los demás campos que deseas mostrar
//         echo "<br>";
//     }
//     echo "Fin de adopciones";
//     echo "<br>";
// } else {
//     echo "No se encontraron registros en la tabla adopciones.";
// }


include 'cerrar_conexion.php';
?>