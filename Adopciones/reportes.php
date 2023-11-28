<link rel="stylesheet" href="../cesese.css">
<title>Reportes de adopciones</title>


</head>
<body>
  <header>
    <h1>Reportes de adopciones</h1>
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
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fechaInicio = $_POST["fecha_inicio"];
  $fechaFin = $_POST["fecha_fin"];
}


function llamada_base_datos_fechas($a, $b){
  include '../conexion.php';
  $query = "SELECT * FROM adopciones WHERE fecha BETWEEN '$a' AND '$b'";  
  global $resultado;
  $resultado = $conn->query($query);
}

llamada_base_datos_fechas($fechaInicio, $fechaFin);

//$resultado = $conn->query($query);

if ($resultado) {
  echo "<table border='1'>
          <tr>
              <th>ID</th>
              <th>Cliente</th>
              <th>Mascota</th>
              <th>Fecha</th>
              <th>Estado legal de adopción</th>
          </tr>";

  while ($fila = $resultado->fetch_assoc()) {
      echo "<tr>
              <td>{$fila['id_adopciones']}</td>";
              echo "<td>";
              if ($fila["id_cliente"] !== " "){
                $get_nombres_id_cliente = "SELECT nombres, apellidos FROM clientes WHERE id_cliente = $fila[id_cliente]";
                $res = mysqli_query($conn, $get_nombres_id_cliente);
                $row = mysqli_fetch_assoc($res);
                echo $row ['nombres'] . " ". $row['apellidos'];
              } else {
                echo "No se encontraron resultados.";
              }
              echo "</td>";

              echo "<td>";
              if ($fila["id_mascota"] !== " "){
                $get_nombres_id_cliente = "SELECT nombre FROM mascotas WHERE id_mascota = $fila[id_mascota]";
                $res = mysqli_query($conn, $get_nombres_id_cliente);
                $row = mysqli_fetch_assoc($res);
                echo $row['nombre'];
              } else {
                echo "No se encontraron resultados.";
              }
              echo "</td>";

              echo "<td>{$fila['fecha']}</td>";

              echo "<td>";
              if ($fila["estado_legal_adopcion"] !== " "){
                $get_nombres_id_cliente = "SELECT nombre_estado_legal_adopcion FROM tabla_estado_legal_adopcion WHERE id_estado_legal_adopcion = $fila[estado_legal_adopcion]";
                $res = mysqli_query($conn, $get_nombres_id_cliente);
                $row = mysqli_fetch_assoc($res);
                echo $row['nombre_estado_legal_adopcion'];
              }
              echo "</td>";
            echo "</tr>";
  }

  echo "</table>";
} else {
  echo "Error en la consulta: " . $conn->error;
}


$conn->close();
?>
