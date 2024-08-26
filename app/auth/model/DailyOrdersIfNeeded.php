<?php

error_reporting(E_ALL); // Error/Exception engine, always use E_ALL permite mostrar todos los errores
ini_set('display_errors', 1); // Error/Exception display, use ini_set to override permite mostrar todos los errores
// session_start();
date_default_timezone_set('America/Lima');
require_once(__DIR__.'/../../../config/database.php');

class DailyOrdersIfNeeded {
  private $con;
  private $sql;
  private $res;

  public function __construct()
  {
    $this->con = new ConnectionDataBase();
    $this->con = $this->con->getConnection();
  }

  public function executeDailyOrdersIfNeeded() {
    $currentDate = date('Y-m-d');
    // Conectar a la base de datos usando PDO la conexión a la base de datos
    $res = $this->con->prepare("SELECT COUNT(*) as total FROM order_date WHERE date_order = :currentDate");
    $res->bindParam(':currentDate', $currentDate);
    $res->execute();
    $row = $res->fetch(PDO::FETCH_ASSOC);
    if ($row['total'] == 0) {
      // Ejecutar el procedimiento almacenado si no se ha ejecutado hoy
      $res = $this->con->prepare("CALL CreateDailyOrders()");
      $res->execute();
    }
  }

  // Limpiar la conexión
  public function __destruct()
  {
    $this->con = null;
  }
}
?>