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
        return $users;
    }
}
?>