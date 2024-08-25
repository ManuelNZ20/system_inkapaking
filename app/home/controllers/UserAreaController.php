<?php
require_once('../model/UserArea.php');

class UserAreaController {
  
  private $model;

  public function __construct() {
    $this->model = new UserAreaModel();
  }

  public function getUsersByArea($area_id) {
    $users = $this->model->getUsersByArea($area_id);
    return $users;
  }
}
?>