<?php
require_once(__DIR__.'/../../controllers/AreaController.php');
require_once(__DIR__.'/../../controllers/OrderDateController.php');
$areaController = new AreaController();
$orderDateController = new OrderDateController();
$user_id = $_SESSION['user_id'];
$area = $areaController->getAreaByUser($user_id);

$user_id = $_SESSION['user_id'];
$user_fullname = $_SESSION['user_fullname'];
$user_email = $_SESSION['user_email'];
// determinar si order_date_id esta definido
$date = date('Y-m-d');
if (isset($_GET['order_date_id'])) {
  $order_date_id = $_GET['order_date_id'];
} else {
  $order_date_id = $orderDateController->getOrderDate($date, $area['id']);
}
?>
<!-- Header para mi pagina que me permita mostrar el nombre de area a la que pertenece un usuario -->
<header class="mt-4 container">
  <div class="row align-items-center">
      <div class="col-md-9">
          <h4 class="text-center"><b>Pedidos por Área</b> <i class="bi bi-bar-chart-line"></i></h4>
          <h5><b>Área: </b><?=$area['name_area'];?></h5>
          <h5><b>Correo: </b><span class="badge text-bg-info"><?=$user_email?></span></h5>
      </div>
      <!-- botón para imprimira datos -->
      <div class="col-md-3">
        <a href="../../app/home/controllers/generate_pdf.php?order_date_id=<?=$order_date_id;?>" 
        class="btn btn-outline-dark mt-2 nav-item"><i class="bi bi-printer-fill"></i> Imprimir PDF</a>
        <a href="<?='../../app/auth/views/logout.php'?>" class="btn btn-outline-dark mt-2 nav-item"><i class="bi bi-box-arrow-left"></i> Salir</a>
        <!-- determinar si el area es de id 1 y 14 los cuales solo pueden mostrarle a estos usuarios -->
        <?php $area_id = $area['id'];?>
        <?php if ($area_id == 1 || $area_id == 14) : ?>
          <a  href="../../app/home/controllers/generate_pdf_all_areas.php?order_date_id=<?=$order_date_id;?>" class="btn btn-outline-dark mt-2 nav-item"><i class="bi bi-table"></i> Lista general</a>
        <?php endif; ?>
      </div>
  </div>
</header>