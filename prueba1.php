<?php

class conexion {
    // // Atributos
    // private $atributo1;
    // private $atributo2;

    // Estos son atributos
    public $server;
    public $nombre_usuario;
    public $contrasena;
    public $base_datos;
    
    // Constructor              Estos son valores 
    public function __construct($servername, $username, $password, $dbname) {
        // Convertir los valores en atributos
        $this->server = $servername;
        $this->nombre_usuario = $username;
        $this->contrasena = $password;
        $this->base_datos = $dbname;
    }
    

    // Getter y Setter
    public function set_servidor($servername) {
        $this->server = $servername;
    }
    public function set_nombre($username) {
        $this->nombre_usuario = $username;
    }
    public function set_contrasena($password) {
        $this->contrasena = $password;
    }
    public function set_db_nombre($dbname) {
        $this->base_datos = $dbname;
    }
    
    public function get_servidor($servername) {
        return $this->server;
    }
    public function get_nombre($username) {
        return $this->nombre_usuario;
    }
    public function get_contrasena($password) {
        return $this->contrasena;
    }
    public function get_db_nombre($dbname) {
        return $this->base_datos;
    }
    
    // Métodos                     Debo llamar los atributos, no valores
    public function hacer_conexion($server, $nombre_usuario, $contrasena, $base_datos) {
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar si la conexión fue exitosa
        if ($conn->connect_error) {
            die('Error de conexión: ' . $conn->connect_error);
        } else {
            print 'Funciona'. $conn;
        }
    }
    public function prueba($server){
        echo $server . "pelele";
    }
    
   
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda_mascotas";

// Crear una instancia de la clase
$objeto = new conexion("localhost", "root", "", "tienda_mascotas");

// // Acceder a los atributos y métodos
// echo $objeto->server;
// $objeto->get_servidor($objeto);
// $objeto->set_servidor("tuma");
// echo $objeto->server;

// $objeto->hacer_conexion($server, $nombre_usuario, $contrasena, $base_datos);

$objeto->prueba(4);

// $objeto->setAtributo2("nuevo valor"); // Cambia el valor de atributo2
// echo $objeto->getAtributo2(); // Imprime el nuevo valor de atributo2


?>