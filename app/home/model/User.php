<?php
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL permite mostrar todos los errores
ini_set('display_errors', 1); // Error/Exception display, use ini_set to override permite mostrar todos los errores
// session_start();
date_default_timezone_set('America/Lima');
require_once(__DIR__.'/../../../config/database.php');

class UserModel {
  private $con;
  private $sql;
  private $res;

  public function __construct()
  {
      $this->con = new ConnectionDataBase();
      $this->con = $this->con->getConnection();
  }
  // Obtener id de usuario por area
  public function getUserIdByArea($area_id) {
    $this->sql = "SELECT user_id FROM user_area WHERE area_id = :area_id";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':area_id', $area_id);
    $this->res->execute();
    $user = $this->res->fetch(PDO::FETCH_ASSOC);
    return $user;
  }
  
  // listar los usuarios por area
  public function getUsersByArea($area_id) {
    $this->sql = "SELECT u.* FROM users u INNER JOIN user_area ua ON u.id = ua.user_id WHERE ua.area_id = :area_id";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':area_id', $area_id);
    $this->res->execute();
    return $this->res->fetchAll(PDO::FETCH_ASSOC);
  }
  // Crear paginación de lista de usuarios
  public function getUsersByAreaPagination($area_id,$limit,$offset) {
    $this->sql = "SELECT u.* FROM users u INNER JOIN user_area ua ON u.id = ua.user_id WHERE ua.area_id = :area_id LIMIT :limit OFFSET :offset";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':area_id', $area_id);
    $this->res->bindParam(':limit', $limit, PDO::PARAM_INT);
    $this->res->bindParam(':offset', $offset, PDO::PARAM_INT);
    $this->res->execute();
    return $this->res->fetchAll(PDO::FETCH_ASSOC);
  }

  // Contar con el total de usuarios por area
  public function countUsersByArea($area_id) {
    $this->sql = "SELECT COUNT(u.id) as total FROM users u INNER JOIN user_area ua ON u.id = ua.user_id WHERE ua.area_id = :area_id";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':area_id', $area_id);
    $this->res->execute();
    $total = $this->res->fetch(PDO::FETCH_ASSOC);
    return $total;
  }
  
}
?>