<?php
require_once(__DIR__.'/../model/UserArea.php');

class UserAreaController {
  
  private $model;

  public function __construct() {
    $this->model = new UserAreaModel();
  }

  public function getUsersByArea($area_id) {
    $users = $this->model->getUsersByArea($area_id);
    return $users;
  }
  public function getAreaIdByUserId($user_id) {
    $area_id = $this->model->getAreaIdByUserId($user_id);
    return $area_id;
  }
}
?>