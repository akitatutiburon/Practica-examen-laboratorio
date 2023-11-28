<link rel="stylesheet" href="../cesese.css">
    <title>Productos</title>


</head>
<body>
    <header>
        <h1>Lista de Productos</h1>
    </header>


<?php
include '../conexion.php';

// Consulta SQL para seleccionar todos los registros de la tabla "movimiento_productos"
$query = "SELECT * FROM movimiento_productos";

// Ejecutar la consulta
$resultado = $conn->query($query);

// Verificar si la consulta fue exitosa
if ($resultado) {
    // Mostrar los resultados en una tabla
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Tipo de Movimiento</th>
                <th>Cliente</th>
                <th>Cantidad</th>
                <th>Producto</th>
            </tr>";

    // Recorrer los resultados y mostrar en una tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>{$fila['id']}</td>";
                echo "<td>";
                if ($fila["tipo_movimiento"] !== " "){
                    $get_nombres_id_cliente = "SELECT nombre_movimiento FROM tabla_movimientos_productos WHERE id_movimiento = $fila[tipo_movimiento]";
                    $res = mysqli_query($conn, $get_nombres_id_cliente);
                    $row = mysqli_fetch_assoc($res);
                    echo $row ['nombre_movimiento'];
                } else {
                    echo "No se encontraron resultados.";
                }
                echo "</td>";
                echo "<td>";
                if ($fila["id_cliente"] !== " "){
                    $get_nombres_id_cliente = "SELECT nombres, apellidos FROM clientes WHERE id_cliente = $fila[id_cliente]";
                    $res = mysqli_query($conn, $get_nombres_id_cliente);
                    $row = mysqli_fetch_assoc($res);
                    echo $row ['nombres'] . " ". $row['apellidos'];
                } else {
                    echo "No se encontraron resultados.";
                }
                echo "</td>
                <td>{$fila['cantidad']}</td>
                <td>";
                if ($fila["id_producto"] !== " "){
                    $get_nombres_id_cliente = "SELECT nombre_producto, cantidad FROM productos WHERE id_producto = $fila[id_producto]";
                    $res = mysqli_query($conn, $get_nombres_id_cliente);
                    $row = mysqli_fetch_assoc($res);
                    // $nueva_cantidad_producto = $row['cantidad'] - $fila['cantidad'];
                    echo $row['cantidad'] . "-" .$fila['cantidad'];
                    $actualizar_q_productos = "UPDATE cantidad FROM productos WHERE id_producto = $fila['id_producto']";
                    $res2 = mysqli_query($conn, $actualizar_q_productos);
                    echo $row ['nombre_producto'];
                  } else {
                    echo "No se encontraron resultados.";
                  }
                  echo "</td>
              </tr>";
    }

    echo "</table>";
} else {
    // Manejar el error si la consulta falla
    echo "Error en la consulta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
