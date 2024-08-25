<?php
require_once(__DIR__.'/../../controllers/OrderUserController.php');

$order_user_controller = new OrderUserController();
$order_date_id = $_POST['order_date_id'] ?? null;

if ($order_date_id === null) {
    echo '<tr><td colspan="5">No se ha proporcionado un ID de fecha de orden.</td></tr>';
    exit;
}

$users = $order_user_controller->getUsersByOrder($order_date_id);

if (empty($users)) {
    echo '<tr><td colspan="5">No se encontraron usuarios.</td></tr>';
    exit;
}

foreach ($users as $index => $user) {
    $prefix = "user_{$user['id']}_";
    $breakfast = $user['breakfast'] == 1 ? 'checked' : '';
    $lunch = $user['lunch'] == 1 ? 'checked' : '';
    $dinner = $user['dinner'] == 1 ? 'checked' : '';
    echo '<tr>
            <td>'.($index + 1).'</td>
            <td>'.$user['fullname'].'</td>
            <td><input type="checkbox" name="order-breakfast['.$user['id'].']" value="1" '.$breakfast.' id="'.$prefix.'breakfast"> <label for="'.$prefix.'breakfast">Ordenar</label></td>
            <td><input type="checkbox" name="order-lunch['.$user['id'].']" value="1" '.$lunch.' id="'.$prefix.'lunch"> <label for="'.$prefix.'lunch">Ordenar</label></td>
            <td><input type="checkbox" name="order-dinner['.$user['id'].']" value="1" '.$dinner.' id="'.$prefix.'dinner"> <label for="'.$prefix.'dinner">Ordenar</label></td>
            <input type="hidden" name="users[]" value="'.$user['id'].'">
          </tr>';
}
