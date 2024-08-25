<?php

require_once('../model/OrderDate.php');
require_once('UserAreaController.php');
require_once('OrderUserController.php');

class OrderDateController {
  private $model;
  private $userAreaController;
  private $orderUserController;

  public function __construct() {
    $this->model = new OrderDateModel();
    $this->userAreaController = new UserAreaController();
    $this->orderUserController = new OrderUserController();
  }
  // Crear orden de fecha
  public function createOrderDate($date,$area_id) {
    $order_date = $this->model->createOrderDate($date,$area_id);
    // TODO: Implementar lógica de negocio
    $user_ids = $this->userAreaController->getUsersByArea($area_id);
    $order_id = $order_date;
    $this->orderUserController->createOrderUser($order_id,$user_ids);
    return $order_date;
  }
  // Obtener id de orden por la fecha
  public function getOrderDateId($date) {
    $order_date = $this->model->getOrderDateId($date);
    return $order_date;
  }
    // Obtener el id de la orden por fecha y por id de área
  public function getOrderDateIdByArea($date,$area_id) {
    $order_date = $this->model->getOrderDateIdByArea($date,$area_id);
    return $order_date;
  }
}


?>