<?php
include('component/card.php');
// tomamos los datos de la sesión
session_start();
if (!isset($_SESSION['user_id'])) {// si no existe la sesión redirigir al login
  header('Location: ../../../');
  exit;
}
$user_id = $_SESSION['user_id'];
$user_fullname = $_SESSION['user_fullname'];
$user_email = $_SESSION['user_email'];
$order_date_id = $_SESSION['order_date_id'];
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
<?php include('component/header_area.php');?>
<div class="container p-2">
  <!-- Combo box para listar las fechas de las ordenes -->
  <div class="row mt-2 mb-2">
    <div class="col-md-2">
      <label for="order-date">Ordenes:</label>
      <select class="form-select" id="order-date">
        <option value="0">Seleccionar</option>
        <option value="1">2022-12-01</option>
        <option value="2">2022-12-02</option>
        <option value="3">2022-12-03</option>
        <option value="4">2022-12-04</option>
        <option value="5">2022-12-05</option>
      </select>
    </div>
  </div>
  <!-- imprimir la fecha de hoy y la hora -->
  <div class="row mt-2 mb-2">
    <div class="col-md-6">
      <h6>Fecha de hoy: <?=date('d/m/Y');?></h6>
    </div>
  </div>
  <form action="process_orders.php" method="post">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre Completo</th>
          <th scope="col">Desayuno</th>
          <th scope="col">Almuerzo</th>
          <th scope="col">Cena</th>
        </tr>
      </thead>
      <tbody>
        <?php include('component/row_table_orders.php');?>
      </tbody>
    </table>
    
    <button type="submit" class="btn btn-dark">Confirmar Órdenes</button>
  </form>
</div>

</body>
</html>
