<?php
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL permite mostrar todos los errores
ini_set('display_errors', 1); // Error/Exception display, use ini_set to override permite mostrar todos los errores
session_start();
date_default_timezone_set('America/Lima');
require_once(__DIR__.'/../../../config/database.php');

class OrderUserModel {
  private $con;
  private $sql;
  private $res;
  private $table = 'order_user';

  public function __construct()
  {
      $this->con = new ConnectionDataBase();
      $this->con = $this->con->getConnection();
  }

  // almacenar los usuarios por orden de fecha
  public function createOrderUser($user_id,$order_date_id) {
    if ($this->userExist($user_id,$order_date_id)) {
      return false;
    }
    $this->sql = "INSERT INTO ".$this->table." (user_id, order_id) VALUES (:user_id, :order_id)";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':user_id', $user_id);
    $this->res->bindParam(':order_id', $order_date_id);
    $this->res->execute();
    return true;
  }
  // determinar si el usuario ya esta registrado en la orden de fecha
  public function userExist($user_id,$order_date_id) {
    $this->sql = "SELECT * FROM ".$this->table." WHERE user_id = :user_id";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':user_id', $user_id);
    $this->res->bindParam(':order_id', $order_date_id);
    $this->res->execute();
    $order_user = $this->res->fetch(PDO::FETCH_ASSOC);
    if ($order_user) {
      return true;
    } else {
      return false;
    }
  }

}
?>