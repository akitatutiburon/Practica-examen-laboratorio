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
$query = "SELECT * FROM tabla";


// Ejecutar la consulta
$result = $conn->query($query);
print_r($result);
if($result->num_rows > 0){
    // 
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

}

// Obtener el número total de registros
$queryTotal = "SELECT COUNT(*) as total FROM tabla";
$resultTotal = mysqli_query($conn, $queryTotal);
//$rowTotal = mysqli_fetch_assoc($resultTotal);
//$totalRegistros = $rowTotal['total'];
print_r($resultTotal);

// Calcular el número de páginas
// $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
$totalPaginas = 5;

// Mostrar los enlaces de paginación
echo "<div class='pagination'>";
for ($i = 1; $i <= $totalPaginas; $i++) {
    echo "<a href='?pagina=$i'>$i</a> ";
}
echo "</div>";

?>