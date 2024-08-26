<?php
require_once(__DIR__.'/../../controllers/AreaController.php');
$areaController = new AreaController();
$user_id = $_SESSION['user_id'];
$area = $areaController->getAreaByUser($user_id);

$user_id = $_SESSION['user_id'];
$user_fullname = $_SESSION['user_fullname'];
$user_email = $_SESSION['user_email'];

$order_date_id = $_GET['order_date_id'];
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
        <a href="../../app/home/controllers/generate_pdf.php?order_date_id=<?=$order_date_id;?>" class="btn btn-outline-dark mt-2 nav-item"><i class="bi bi-printer-fill"></i> Imprimir PDF</a>
        <a href="<?='../../app/auth/views/logout.php'?>" class="btn btn-outline-dark mt-2 nav-item"><i class="bi bi-box-arrow-left"></i> Salir</a>
        <a  href="../../app/home/controllers/generate_pdf_all_areas.php?order_date_id=<?=$order_date_id;?>" class="btn btn-outline-dark mt-2 nav-item"><i class="bi bi-table"></i> Lista general</a>
      </div>
  </div>
</header>