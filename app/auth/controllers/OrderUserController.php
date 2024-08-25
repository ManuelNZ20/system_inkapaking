<?php

require_once(__DIR__.'/../model/OrderUser.php');

class OrderUserController {
  private $model;

  public function __construct() {
    $this->model = new OrderUserModel();
  }

  // Crear una orden por el id de la orden creada y el ids de los usuarios
  public function createOrderUser($order_id,$user_ids) {
    $order_user = $this->model->createOrderUser($order_id,$user_ids);
    return $order_user;
  }

  // Almacenar los dats de un usuario por el id de usuario y id de orden
  public function storeUserOrder($user_id,$order_id) {
    $order_user = $this->model->storeUserOrder($user_id,$order_id);
    return $order_user;
  }
}

?>