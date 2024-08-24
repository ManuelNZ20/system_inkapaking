<?php

require_once('../model/OrderDate.php');

class OrderDateController {
  private $model;
  
  public function __construct() {
    $this->model = new OrderDateModel();
  }
  // Crear orden de fecha
  public function createOrderDate($date,$area_id) {
    $order_date = $this->model->createOrderDate($date,$area_id);
    return $order_date;
  }
  // Obtener id de orden por la fecha
  public function getOrderDateId($date) {
    $order_date = $this->model->getOrderDateId($date);
    return $order_date;
  }
}


?>