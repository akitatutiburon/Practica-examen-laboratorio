<?php
include '../conexion.php';


// Obtener los valores enviados desde el formulario
$id_cliente = $_POST['id_cliente'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$numero_ci = $_POST['numero_ci'];
$edad = $_POST['edad'];
$ingreso_bruto_mensual = $_POST['ingreso_bruto_mensual'];

// Crear la consulta SQL para insertar el registro en la tabla
$sql = "INSERT INTO  clientes (`id_cliente`, `nombres`, `apellidos`, `numero_ci`, `edad`, `ingreso_bruto_mensual`) VALUES ('$id_cliente', '$nombres', '$apellidos', '$numero_ci', '$edad', '$ingreso_bruto_mensual')";
echo $sql. " ";

// Ejecutar la consulta SQL
if (mysqli_query($conn, $sql)) {
    echo "Registro ingresado correctamente";
} else {
    echo "Error al ingresar el registro: " . mysqli_error($conn);
}


include '../cerrar_conexion.php';
?>
<a class='boton_regresar' href='clientes.php'></br>Entendido</a>