<?php
require_once('../model/User.php');
require_once('OrderDateController.php');
require_once('UserAreaController.php');
require_once('OrderUserController.php');

$orderDateController = new OrderDateController();
$userAreaController = new UserAreaController();
$orderUserController = new OrderUserController();

class UserController {
  public function register() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Obtener los datos del formulario
      $email = $_POST['mail'];
      $password = $_POST['password'];
      $fullname = $_POST['fullname'];
      $area_id = $_POST['area_id'];
      // Validar los datos si es necesario
      // Guardar en la base de datos
      $userModel = new UserModel();
      $userId = $userModel->createUser($email, $password, $fullname, $area_id);
      return $userId;
    }
  }
}
// Instanciar el controlador y llamar al método register
$userController = new UserController();
$result = $userController->register();
if($result) {
  // 2024-08-24
  $user_id = $result;
  $date = date('Y-m-d');
  // READ
  // obtener el id del área del usuario
  $area_id = $userAreaController->getAreaByUser($user_id);
  // obtener el id de la orden por fecha y por area
  $orderDateId = $orderDateController->getOrderDateIdByArea($date,$area_id);
  // CREATE
  // Almacenar los datos del usuario por el id de usuario y el id de la orden
  $orderUserController->storeUserOrder($user_id,$orderDateId);
  // Redirigir a la página de confirmación si el registro fue exitoso
  header('Location: ../views/confirmation.php');
  exit();
} else {
  // Redirigir de nuevo al formulario de registro con un mensaje de error (opcional)
  header('Location: ../views/register.php?error=registration_failed');
  exit();
}
?>