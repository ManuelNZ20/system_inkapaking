<?php
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL permite mostrar todos los errores
ini_set('display_errors', 1); // Error/Exception display, use ini_set to override permite mostrar todos los errores
// session_start();
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

  // obtener el id de la orden por el id de usuario y la fecha
  public function getOrderUser($user_id,$order_date_id) {
    $this->sql = "SELECT * FROM ".$this->table." WHERE user_id = :user_id AND order_id = :order_id";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':user_id', $user_id);
    $this->res->bindParam(':order_id', $order_date_id);
    $this->res->execute();
    $order_user = $this->res->fetch(PDO::FETCH_ASSOC);
    return $order_user;
  }

  // obtener la lista de los usuarios por el id de la orden, mostrando el nombre completo y los datos de la tabla order_user, como breackfast, lunch, dinner
  public function getUsersByOrder($order_date_id) {
    $this->sql = "SELECT u.id, u.fullname, ou.breakfast, ou.lunch, ou.dinner FROM users u INNER JOIN ".$this->table." ou ON u.id = ou.user_id WHERE ou.order_id = :order_id";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':order_id', $order_date_id);
    $this->res->execute();
    $users = $this->res->fetchAll(PDO::FETCH_ASSOC);
    return $users;
  }
  // Actualizar los datos de la tabla order_user
  public function updateOrderUser($user_id,$order_date_id,$breakfast,$lunch,$dinner) {
    $this->sql = "UPDATE ".$this->table." SET breakfast = :breakfast, lunch = :lunch, dinner = :dinner WHERE user_id = :user_id AND order_id = :order_id";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':breakfast', $breakfast);
    $this->res->bindParam(':lunch', $lunch);
    $this->res->bindParam(':dinner', $dinner);
    $this->res->bindParam(':user_id', $user_id);
    $this->res->bindParam(':order_id', $order_date_id);
    $this->res->execute();
    return true;
  }
  // Limpiar la conexión
  public function __destruct()
  {
      $this->con = null;
  }
}
?>