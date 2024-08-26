<?php
require_once('OrderUserController.php');

// Inicializar el controlador
$order_user_controller = new OrderUserController();

var_dump($_POST['users']);
// Procesar cada usuario

$users = $_POST['users'] ?? [];

$order_date_id = $_POST['order_date_id'] ?? null;
// Verificar que el order_date_id no sea nulo
if ($order_date_id === null) {
  // Redirigir o mostrar un mensaje de error
  header('Location: ../../home/home.php?status=error');
  exit;
}
// DETERMINAR SI SE ESTAN ACTUALIZANDO LOS DATOS DEL DÍA DE HOY
// SI CUMPLE CON LA CONDICIÓN SE ACTUALIZA
// SI NO SE REDIRIGE A LA PÁGINA DE INICIO
// fecha actual

foreach ($users as $user_id) {
  // Obtener el estado de cada tipo de comida
  $breakfast = isset($_POST['order-breakfast'][$user_id]) ? 1 : 0;
  $lunch = isset($_POST['order-lunch'][$user_id]) ? 1 : 0;
  $dinner = isset($_POST['order-dinner'][$user_id]) ? 1 : 0;
  // Actualizar el registro
  $verify = $order_user_controller->updateOrderUser($user_id, $order_date_id, $breakfast, $lunch, $dinner);
  echo $verify? "Actualizado" : "No actualizado";
  // salto de línea
  // echo "<br>";
}
// Redirigir o mostrar un mensaje de éxito
header('Location: ../../home/home.php?status=success');
exit;


?>