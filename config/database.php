<?php
// Conectar a mi base de datos local
require_once(__DIR__.'/config.php');

class ConnectionDataBase {
    private $con;

    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:host=".HOST.";dbname=".BASE.";port=".PORT, USER, PASS);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Mejora el manejo de errores
        } catch (PDOException $e) {
            // Manejo de errores adecuado
            echo "Error en la conexión: " . $e->getMessage();
            exit;
        }
    }

    public function getConnection()
    {
        return $this->con;
    }

    public function __destruct()
    {
        // Cerrar la conexión al destruir el objeto
        $this->con = null;
    }
}
?>
