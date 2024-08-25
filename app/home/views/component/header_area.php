<?php
require_once(__DIR__.'/../../controllers/AreaController.php');
$areaController = new AreaController();
$user_id = $_SESSION['user_id'];
$area = $areaController->getAreaByUser($user_id);

$user_id = $_SESSION['user_id'];
$user_fullname = $_SESSION['user_fullname'];
$user_email = $_SESSION['user_email'];
?>
<!-- Header para mi pagina que me permita mostrar el nombre de area a la que pertenece un usuario -->
<header class="mt-4 container">
  <div class="row align-items-center">
      <div class="col-md-10">
          <h4 class="text-center"><b>Pedidos por Área</b></h4>
          <h5><b>Email: </b><span class="badge text-bg-info"><?=$user_email?></span></h5>
          <h5><b>Area: </b><?=$area['name_area']; ?></h5>
      </div>
      <!-- botón para imprimira datos -->
      <div class="col-md-2">
        <button class="btn btn-outline-dark mt-2" onclick="window.print()">Imprimir PDF</button>
        <a href="<?='../../app/auth/views/logout.php'?>" class="btn btn-outline-dark mt-2 nav-item"><i class="bi bi-box-arrow-left"></i></a>
        <a href="<?='../../app/auth/views/logout.php'?>" class="btn btn-outline-dark mt-2 nav-item"><i class="bi bi-person-gear"></i></a>
      </div>
  </div>
</header>