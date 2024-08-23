<?php
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL permite mostrar todos los errores
ini_set('display_errors', 1); // Error/Exception display, use ini_set to override permite mostrar todos los errores
session_start();
date_default_timezone_set('America/Lima');
require_once(__DIR__.'/../../../config/database.php');

class AreaModel {
    private $con;
    private $sql;
    private $res;

    public function __construct()
    {
        $this->con = new ConnectionDataBase();
        $this->con = $this->con->getConnection();
    }

    public function getAreas()
    {
        $this->sql = "SELECT * FROM areas";
        $this->res = $this->con->prepare($this->sql);
        $this->res->execute();
        return $this->res->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>