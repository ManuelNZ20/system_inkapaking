<?php
require_once(__DIR__.'/../../controllers/AreaController.php');
$areaController = new AreaController();
$user_id = $_SESSION['user_id'];
$area = $areaController->getAreaByUser($user_id);
?>
<!-- Header para mi pagina que me permita mostrar el nombre de area a la que pertenece un usuario -->
<header class="mt-4 container">
  <div class="row align-items-center">
      <div class="col-md-10">
          <h4><b>Pedidos por Área</b></h4>
          <h5><b>Area: </b><?=$area['name_area']; ?></h5>
          <!-- Estado de la orden -->
          <h5><b>Estado: </b>
              <span class="badge text-bg-warning">Pendiente</span>
              <?php
              // if ($area['status'] == 1) {
              //     echo 'Activo';
              // } else {
                  // echo 'Pendiente';
              // }
              ?>
          </h5>
          <!-- <h5><b>Usuario: </b><?=$_SESSION['user_email'];?></h5>
          <h5><b>Nombre Completo: </b><?=$_SESSION['user_fullname'];?></h5> -->
      </div>
      <!-- botón para imprimira datos -->
      <div class="col-md-2">
        <button class="btn btn-outline-dark mt-2" onclick="window.print()">Imprimir PDF</button>
        <a href="<?='../../app/auth/views/logout.php'?>" class="btn btn-outline-dark mt-2 nav-item"><i class="bi bi-box-arrow-left"></i></a>
        <a href="<?='../../app/auth/views/logout.php'?>" class="btn btn-outline-dark mt-2 nav-item"><i class="bi bi-person-gear"></i></a>
      </div>
  </div>
</header>