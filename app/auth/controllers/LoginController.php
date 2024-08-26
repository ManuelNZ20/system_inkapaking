<?php
session_start();
require_once('../model/User.php');
require_once('../model/DailyOrdersIfNeeded.php');
require_once('OrderDateController.php');
require_once('AreaController.php');

class LoginController {
  public function authenticateUserLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['mail'];
        $password = $_POST['password'];
        $userModel = new UserModel();
        // Autenticar usuario
        $user = $userModel->authenticateUser($email, $password);
        return $user;
      }
      return false;
  }

  public function executeDailyOrdersIfNeeded() {
    $dailyOrdersIfNeeded = new DailyOrdersIfNeeded();
    $dailyOrdersIfNeeded->executeDailyOrdersIfNeeded();
  }
}
$orderDateController = new OrderDateController();
$areaController = new AreaController();
// Instanciar el controlador y llamar al método authenticateUserLogin
$controller = new LoginController();
$result = $controller->authenticateUserLogin();
$user = $result;

if ($result) {
  // Ejecutar el procedimiento si es necesario
  $controller->executeDailyOrdersIfNeeded();
  // Si la autenticación es exitosa, iniciar sesión
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['user_fullname'] = $user['fullname'];
  $_SESSION['user_email'] = $user['email'];
  // Redirigir al dashboard u otra página
  header("Location: ../../home/home.php");
  exit;
} else {
  // Redirigir al login con un mensaje de error
  header("Location: ../../../index.php?error=invalid_credentials");
  exit;
}

?>