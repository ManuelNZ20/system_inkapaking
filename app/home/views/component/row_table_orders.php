<?php
require_once(__DIR__.'/../../controllers/UserController.php');
require_once(__DIR__.'/../../controllers/AreaController.php');

$user_controller = new UserController();
$area_controller = new AreaController();

$area_id = $area_controller->getAreaByUser($_SESSION['user_id']);
$users = $user_controller->getUsersByArea($area_id['id']);

foreach ($users as $index => $user) :
    $prefix = "user_{$user['id']}_";
?>
<tr>
    <td><?=$user['id']; ?></td>
    <td><?=$user['fullname']; ?></td>
    <td><input type="checkbox" name="order-breakfast[<?=$user['id'];?>]" id="<?=$prefix;?>breakfast"> <label for="<?=$prefix;?>breakfast">Ordenar</label></td>
    <td><input type="checkbox" name="order-lunch[<?=$user['id'];?>]" id="<?=$prefix;?>lunch"> <label for="<?=$prefix;?>lunch">Ordenar</label></td>
    <td><input type="checkbox" name="order-dinner[<?=$user['id'];?>]" id="<?=$prefix;?>dinner"> <label for="<?=$prefix;?>dinner">Ordenar</label></td>
</tr>
<?php endforeach; ?>
