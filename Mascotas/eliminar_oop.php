<?php
$id_mascota = $_GET['id'];

///echo $id_mascota;


// Clase para la gestión de la base de datos
class BaseDeDatos {
    // Atributos de conexión
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "tienda_mascotas";
    private $conn;

    
    public function conectar() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    // Método para realizar una consulta DELETE
    public function eliminar($id) {
        $sql = "DELETE FROM mascotas WHERE id_mascota = $id";
        if ($this->conn->query($sql) === TRUE) {
            echo "Registro eliminado correctamente.";
        } else {
            echo "Error al eliminar el registro: " . $this->conn->error;
        }
    }

    // Método para cerrar la conexión
    public function cerrarConexion() {
        $this->conn->close();
    }
}

// Crear una instancia de la clase BaseDeDatos
$bd = new BaseDeDatos("localhost", "root", "", "tienda_mascotas");

// Conectar a la base de datos
$bd->conectar();


// $bd->mostrar_variable();


$bd->eliminar($id_mascota);

// Cerrar la conexión
$bd->cerrarConexion();
?>