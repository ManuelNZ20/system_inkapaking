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

  public function __construct()
  {
      $this->con = new ConnectionDataBase();
      $this->con = $this->con->getConnection();
  }

  // Crear orden segun las lista de usuarios por area
  public function createOrderUser($order_id,$user_ids) {
    // Verificar si la orden ya existe
    if ($this->orderAreaExist($order_id)) {
      return false;
    }
    $values = [];
    if (!is_array($user_ids) || empty($user_ids)) {
      throw new InvalidArgumentException('La lista de usuarios debe ser un array no vacío.');
    }
    foreach($user_ids as $user_id) {
      // Escapar correctamente las variables para prevenir inyecciones SQL
      $values[] = "(" . intval($order_id) . "," . intval($user_id) . ")";
    }
    $values = implode(",",$values);// convertir array en string
    var_dump($values);
    $sql = "INSERT INTO order_user (order_id, user_id) VALUES ".$values;
    try {
      $this->res = $this->con->prepare($sql);
      $this->res->execute();
      return true;
    } catch (PDOException $e) {
      throw new Exception("Error al ejecutar la consulta: " . $e->getMessage());
    }
  }


  // Determinar si la orden ya existe
  private function orderAreaExist($order_id) {
    $this->sql = "SELECT * FROM order_user WHERE order_id = :order_id";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':order_id', $order_id);
    $this->res->execute();
    $existOrder = $this->res->fetch(PDO::FETCH_ASSOC);
   return $existOrder?true:false;
  }
  // Almacenar los datos de un usuario por el id de usuario y id de orden
  public function storeUserOrder($user_id,$order_id) {
    $this->sql = "INSERT INTO order_user (user_id, order_id) VALUES (:user_id, :order_id)";
    $this->res = $this->con->prepare($this->sql);
    $this->res->bindParam(':user_id', $user_id);
    $this->res->bindParam(':order_id', $order_id);
    return $this->res->execute();
  }
  // Limpiar la conexión
  public function __destruct()
  {
      $this->con = null;
  }
}

?>