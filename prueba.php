<?php
include 'conexion.php';

$llamada_tabla_estado_salud = "SELECT * FROM tabla_estado_salud";
$respuesta_llamada_tabla_estado_salud = $conn->query($llamada_tabla_estado_salud);

// foreach ($respuesta_llamada_tabla_estado_salud as $cosa_rara){
//     echo $cosa_rara['id_estado_salud'];
//     echo $cosa_rara['nombre_estado_salud'];
// } 

$variable_chota = 1;

foreach ($respuesta_llamada_tabla_estado_salud as $default){
    
    print_r($default);


    

    switch ($variable_chota){
        case 1:
            echo $default['nombre_estado_salud']. ' ';
            break;
        case 2:
            echo $default['nombre_estado_salud']. ' ';
            break;
        case 3:
            echo $default['nombre_estado_salud']. ' ';
            break;
        case 4:
            echo $default['nombre_estado_salud']. ' ';
            break;
        case 5:
            echo $default['nombre_estado_salud']. ' ';
            break;
        case 6:
            echo $default['nombre_estado_salud']. ' ';
            break;
        default:
            echo "Error en ingreso de datos en base de datos";
            break;
    }
}





include 'cerrar_conexion.php';
?>