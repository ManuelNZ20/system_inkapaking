<?php
// Conectar a mi base de datos local
require_once(__DIR__.'/config.php');

class ConnectionDataBase {
  private $con;

  public function __construct()
  {
      $this->con = new PDO("mysql:host=b6aqzoafsptlwn1dljif-mysql.services.clever-cloud.com;dbname=b6aqzoafsptlwn1dljif;port=3066", "uq7mskwqwg8xjqs4", "tVqq8uXhXNkBJRpgx3Ez");
      if (!$this->con) {
          echo "Error en la conexión";
          exit;
      } else {
          // echo "Conexión exitosa";
          return;
      }
  }

  public function getConnection()
  {
      return $this->con;
  }

}
?>