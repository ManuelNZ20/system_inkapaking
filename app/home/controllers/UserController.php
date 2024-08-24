<?php
require_once(__DIR__.'/../model/User.php');

class UserController {
  private $model;
  
  public function __construct() {
    $this->model = new UserModel();
  }
  // Obtener id de usuario por area
  public function getUserIdByArea($area_id) {
    $user = $this->model->getUserIdByArea($area_id);
    return $user;
  }
  // listar los usuarios por area
  public function getUsersByArea($area_id) {
    $users = $this->model->getUsersByArea($area_id);
    return $users;
  }
  // Crear paginación de lista de usuarios
  public function getUsersByAreaPagination($area_id,$limit,$offset) {
    $users = $this->model->getUsersByAreaPagination($area_id,$limit,$offset);
    return $users;
  }
  // Contar con el total de usuarios por area
  public function countUsersByArea($area_id) {
    $total = $this->model->countUsersByArea($area_id);
    return $total;
  }

}

?>