<?php
session_start();
require_once('../model/User.php');

class LoginController {
  public function authenticateUserLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['mail'];
        $password = $_POST['password'];
        $userModel = new UserModel();
        // Autenticar usuario
        $userModel->authenticateUser($email, $password);
        return true;
      }
      return false;
  }
}

// Instanciar el controlador y llamar al método authenticateUserLogin
$controller = new LoginController();
$result = $controller->authenticateUserLogin();
var_dump($result);

if ($result) {
  // Si la autenticación es exitosa, iniciar sesión
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['user_fullname'] = $user['fullname'];
  $_SESSION['user_email'] = $user['email'];

  // Redirigir al dashboard u otra página
  header("Location: ../../home/home.php");
  exit;
} else {
  // Redirigir al login con un mensaje de error
  header("Location: ../views/login.php?error=invalid_credentials");
  exit;
}

?>