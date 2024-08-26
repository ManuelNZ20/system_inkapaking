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

// id de área
$area_id = $area_controller->getAreaByUser($user_id)['id'];

// Verificar si se ha seleccionado una fecha en el combo box
if (isset($_GET['order_date_id']) && $_GET['order_date_id'] != -1) {
    $order_date_id = $_GET['order_date_id'];
    $date_order_filter = $order_date_controller->getOrderDateById($order_date_id)['date_order'];
} else {
    $order_date_id = $order_date_controller->getOrderDate($date, $area_id);
    $date_order_filter = $date;
}
// Lista de órdenes por fecha
$order_list_date = $order_date_controller->listOrderDate($area_id);
?>
<!-- Mostrar un mensaje de error o confirmación según los parámetros enviados -->
<div class="container p-2">
    <?php if (isset($_GET['status'])) : ?>
        <div class="alert alert-<?=$_GET['status'] === 'success' ? 'success' : 'danger';?> alert-dismissible fade show" role="alert">
            <?=$_GET['status'] === 'success' ? 'Órdenes actualizadas correctamente' : 'Error al actualizar las órdenes';?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <!-- Combo box para listar las fechas de las órdenes -->
    <div class="row mt-2 mb-2">
        <div class="col-md-3">
            <form method="GET">
                <select class="form-select" id="order-date" name="order_date_id" onchange="this.form.submit()">
                    <option value="-1">Seleccionar</option>
                    <?php foreach ($order_list_date as $order_date) : ?>
                        <option value="<?=$order_date['id'];?>" <?= $order_date_id == $order_date['id'] ? 'selected' : ''; ?>>
                            <?=$order_date['date_order'];?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
    </div>
    <!-- Imprimir la fecha seleccionada -->
    <div class="row mt-2 mb-2">
        <div class="col-md-6">
            <h6>Fecha seleccionada: <?=$date_order_filter;?></h6>
        </div>
    </div>
    <form action="../home/controllers/process_order.php" method="POST">
        <!-- Campo oculto para el ID de la fecha de la orden -->
        <input type="hidden" name="order_date_id" value="<?=$order_date_id;?>">
        <div class="table-responsive">
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
                        <!-- Enviar la lista de id de usuarios -->
                        <input type="hidden" name="users[]" value="<?=$user['id'];?>">
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <!-- Deshabilitar el botón si la fecha no es la actual -->
        <button type="submit" class="mt-3 btn btn-dark" <?= $date_order_filter != $date ? 'disabled' : ''; ?>>Confirmar Órdenes</button>
    </form>
</div>
