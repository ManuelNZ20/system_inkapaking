<?php
require_once('../model/User.php');

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
      $userModel->createUser($email, $password, $fullname, $area_id);
      return true;
    }
  }
}

// Instanciar el controlador y llamar al método register
$controller = new UserController();
$result = $controller->register();
if($result) {
    // Redirigir a la página de confirmación si el registro fue exitoso
    header('Location: ../views/confirmation.php');
    exit();
} else {
    // Redirigir de nuevo al formulario de registro con un mensaje de error (opcional)
    header('Location: ../views/register.php?error=registration_failed');
    exit();
}
?>