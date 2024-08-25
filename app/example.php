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