<?php
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL permite mostrar todos los errores
ini_set('display_errors', 1); // Error/Exception display, use ini_set to override permite mostrar todos los errores
// session_start();
date_default_timezone_set('America/Lima');
require_once(__DIR__.'/../../../config/database.php');

class UserAreaModel {
    private $con;
    private $sql;
    private $res;
    
    public function __construct()
    {
        $this->con = new ConnectionDataBase();
        $this->con = $this->con->getConnection();
    }

    // obtener la lista de usuarios de la tabla user_area por el id del área
    public function getUsersByArea($area_id) {
        $this->sql = "SELECT user_id FROM user_area WHERE area_id = :area_id";
        $this->res = $this->con->prepare($this->sql);
        $this->res->bindParam(':area_id', $area_id);
        $this->res->execute();
        $users = $this->res->fetchAll(PDO::FETCH_ASSOC);
        // Liberar la conexión
        $this->res = null;
        return $users;
    }
    // Obtener el id del area a la que pertenece un usuario por su id, haciendo la consulta a las tablas users.y user_area,
    public function getAreaIdByUserId($user_id) {
        $this->sql = "SELECT area_id FROM user_area WHERE user_id = :user_id";
        $this->res = $this->con->prepare($this->sql);
        $this->res->bindParam(':user_id', $user_id);
        $this->res->execute();
        $area_id = $this->res->fetchColumn();
        return $area_id;
    }
    // Limpiar la conexión
    public function __destruct()
    {
        $this->con = null;
    }
}
?>