<?php
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL permite mostrar todos los errores
ini_set('display_errors', 1); // Error/Exception display, use ini_set to override permite mostrar todos los errores
// session_start();
date_default_timezone_set('America/Lima');
require_once(__DIR__.'/../../../config/database.php');


class OrderDateModel {
  private $con;
  private $sql;
  private $res;
  private $table = 'order_date';

  public function __construct()
  {
      $this->con = new ConnectionDataBase();
      $this->con = $this->con->getConnection();
  }
  // Crear orden de fecha
  public function createOrderDate($date,$area_id) {
    if ($this->orderDateExist($date,$area_id)) {
      return false;
    }
    $this->sql = "INSERT INTO order_date (date_order, area_id) VALUES (:date, :area_id)";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':date', $date);
    $this->res->bindParam(':area_id', $area_id);
    $this->res->execute();
    // obtener el id de la orden de fecha
    $order_date_id = $this->con->lastInsertId();
    return true;
  }
  
  // determinar si la orden por fecha y por area ya existe
  private function orderDateExist($date,$area_id) {
    $this->sql = "SELECT * FROM order_date WHERE date_order = :date AND area_id = :area_id";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':date', $date);
    $this->res->bindParam(':area_id', $area_id);
    $this->res->execute();
    $order_date = $this->res->fetch(PDO::FETCH_ASSOC);
    if ($order_date) {
      return true;
    } else {
      return false;
    }
  }

  // Obtener id de orden por la fecha
  public function getOrderDateId($date) {
    $this->sql = "SELECT id FROM order_date WHERE date_order = :date";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':date', $date);
    $this->res->execute();
    $order_date = $this->res->fetch(PDO::FETCH_ASSOC);
    return $order_date;
  }

  // Obtener la orden por la fecha y el area
  public function getOrderDate($date,$area_id) {
    $this->sql = "SELECT id FROM order_date WHERE date_order = :date AND area_id = :area_id";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':date', $date);
    $this->res->bindParam(':area_id', $area_id);
    $this->res->execute();
    $order_date = $this->res->fetch(PDO::FETCH_ASSOC);
    return $order_date['id'];
  }
  // Listar las fechas existentes en la base de datos por el id de area
  public function listOrderDate($area_id) {
    $this->sql = "SELECT * FROM order_date WHERE area_id = :area_id";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':area_id', $area_id);
    $this->res->execute();
    $order_date = $this->res->fetchAll(PDO::FETCH_ASSOC);
    return $order_date;
  }

  public function getOrderDateById($order_date_id) {
    $this->sql = "SELECT * FROM order_date WHERE id = :order_date_id";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':order_date_id', $order_date_id);
    $this->res->execute();
    $order_date = $this->res->fetch(PDO::FETCH_ASSOC);
    return $order_date;
  }

  // cerrar conexion cuando se destruya el objeto
  public function __destruct()
  {
    $this->res = null; // Liberar la declaración preparada
    $this->con = null; // Cerrar la conexión
  }
}
?>