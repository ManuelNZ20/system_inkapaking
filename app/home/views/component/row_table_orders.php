<?php
require_once(__DIR__.'/../../controllers/AreaController.php');
require_once(__DIR__.'/../../controllers/OrderDateController.php');
require_once(__DIR__.'/../../controllers/OrderUserController.php');

$area_controller = new AreaController();
$order_date_controller = new OrderDateController();
$order_user_controller = new OrderUserController();
// id de usuario
$user_id = $_SESSION['user_id'];
// fecha actual
$date = date('Y-m-d');
// id de area
$area_id = $area_controller->getAreaByUser($user_id)['id'];
// Lista de ordenes por fecha
$order_list_date = $order_date_controller->listOrderDate($area_id);
?>
<!-- Mostrar un mensaje de error o confirmacion segun los parametros enviados -->
<div class="container p-2">
    <?php if (isset($_GET['status'])) : ?>
        <div class="alert alert-<?=$_GET['status'] === 'success' ? 'success' : 'danger';?> alert-dismissible fade show" role="alert">
            <?=$_GET['status'] === 'success' ? 'Órdenes actualizadas correctamente' : 'Error al actualizar las órdenes';?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
  <!-- Combo box para listar las fechas de las ordenes -->
  <div class="row mt-2 mb-2">
    <div class="col-md-3">
      <!-- <label for="order-date">Ordenes:</label> -->
       <!-- <form action="" method="GET">
         </form> -->
         <select class="form-select" id="order-date" name="order_date_id">
           <option value="-1">Seleccionar</option>
           <?php foreach ($order_list_date as $order_date) : ?>
            <option value="<?=$order_date['id'];?>"><?=$order_date['date_order'];?></option>
            <?php endforeach; ?>
          </select>
    </div>
  </div>
    <?php $order_date_id = $order_date_controller->getOrderDate($date,$area_id);?>
  <!-- imprimir la fecha de hoy y la hora -->
  <div class="row mt-2 mb-2">
    <div class="col-md-6">
      <h6>Fecha: <?=date('d/m/Y');?></h6>
    </div>
  </div>
  <form action="../home/controllers/process_order.php" method="POST">
    <!-- Campo oculto para el ID de la fecha de la orden -->
    <input type="hidden" name="order_date_id" value="<?=$order_date_id;?>">
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
        <?php
            $users = $order_user_controller->getUsersByOrder($order_date_id);
            foreach ($users as $index => $user) :
            $prefix = "user_{$user['id']}_";
        ?>
            <tr>
                <td><?=$index + 1 ?></td>
                <td><?=$user['fullname']; ?></td>
                <?php   
                    $breakfast = $user['breakfast'] == 1 ? 'checked' : '';
                    $lunch = $user['lunch'] == 1 ? 'checked' : '';
                    $dinner = $user['dinner'] == 1 ? 'checked' : '';
                ?>
                <td><input type="checkbox" name="order-breakfast[<?=$user['id'];?>]" value="1" <?=$breakfast;?> id="<?=$prefix;?>breakfast"> <label for="<?=$prefix;?>breakfast">Ordenar</label></td>
                <td><input type="checkbox" name="order-lunch[<?=$user['id'];?>]" value="1" <?=$lunch;?> id="<?=$prefix;?>lunch"> <label for="<?=$prefix;?>lunch">Ordenar</label></td>
                <td><input type="checkbox" name="order-dinner[<?=$user['id'];?>]" value="1" <?=$dinner;?> id="<?=$prefix;?>dinner"> <label for="<?=$prefix;?>dinner">Ordenar</label></td>
                <!-- enviar la lista de id de usuarios -->
                <input type="hidden" name="users[]" value="<?=$user['id'];?>">
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-dark">Confirmar Órdenes</button>
</form>
</div>