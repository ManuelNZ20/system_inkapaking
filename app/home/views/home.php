<?php
include('component/card.php');
include('component/loading_screen.php');
// tomamos los datos de la sesión
session_start();
if (!isset($_SESSION['user_id'])) {// si no existe la sesión redirigir al login
  header('Location: ../../../');
  exit;
}
$user_id = $_SESSION['user_id'];
$user_fullname = $_SESSION['user_fullname'];
$user_email = $_SESSION['user_email'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Ordenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../public/css/home.css">
    <link rel="shortcut icon" href="https://static.vecteezy.com/system/resources/previews/009/266/584/non_2x/icon-sun-design-free-png.png">
</head>
<body>
  <!-- header -->
  <?php include('component/header_area.php');?>
  <!-- table -->
  <?php include('component/row_table_orders.php');?>
  <!-- Pantalla de carga -->
  <?=loadingScreen()?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="/public/js/viewLoadingScreen.js"></script>
<script src="/public/js/navigatorView.js"></script>
</body>
</html>
