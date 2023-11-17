<?php
// Obtén el valor del botón que se ha hecho clic
$valor = $_GET['valor_filtrar'];
$valor = 3;
echo $valor;

// Filtra los datos de la columna correspondiente utilizando el valor obtenido
echo "<a href='prueba2.php?valor_filtrar='".$valor.">Ir al documento destino</a>"
// Muestra los datos filtrados en la tabla HTML
?>