<?php
include 'conexion.php';

// Número de registros por página
$registrosPorPagina = 10;

// Obtener el número de página actual
if (isset($_GET['pagina'])) {
    $paginaActual = $_GET['pagina'];
} else {
    $paginaActual = 1;
}

// Calcular el desplazamiento
$desplazamiento = ($paginaActual - 1) * $registrosPorPagina;

// Consulta SQL con la cláusula LIMIT y OFFSET
$query = "SELECT * FROM tabla LIMIT $registrosPorPagina OFFSET $desplazamiento";


// // Mostrar los resultados en una tabla
// echo "<table border='1'>
//         <tr>
//             <th>ID</th>
//             <th>Columna1</th>
//             <th>Columna2</th>
//             <!-- Agrega más columnas según tu tabla -->
//         </tr>";

// while ($fila = $resultado->fetch_assoc()) {
//     echo "<tr>
//             <td>{$fila['id']}</td>
//             <td>{$fila['columna1']}</td>
//             <td>{$fila['columna2']}</td>
//             <!-- Agrega más celdas según tu tabla -->
//           </tr>";
// }

// echo "</table>";


// Ejecutar la consulta
$result = $conn->query($query);

// Crear la tabla HTML
echo "<table>";
echo "<tr><th>ID</th><th>Nombre</th></tr>";

// Mostrar los registros en la tabla
while ($row = ($result->fetch_row()>0)) {
    //printf("%s (%s)\n", $row[0], $row[1]);
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Obtener el número total de registros
$queryTotal = "SELECT COUNT(*) as total FROM tabla";
$resultTotal = mysqli_query($conn, $queryTotal);
$rowTotal = mysqli_fetch_assoc($resultTotal);
$totalRegistros = $rowTotal['total'];

// Calcular el número de páginas
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

// Mostrar los enlaces de paginación
echo "<div class='pagination'>";
for ($i = 1; $i <= $totalPaginas; $i++) {
    echo "<a href='?pagina=$i'>$i</a>";
}
echo "</div>";s

?>