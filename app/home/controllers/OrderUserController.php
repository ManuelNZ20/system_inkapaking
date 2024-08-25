<?php
require_once(__DIR__.'/../model/OrderUser.php');

class OrderUserController
{
    private $model;

    public function __construct()
    {
        $this->model = new OrderUserModel();
    }
    public function createOrderUser($user_id,$order_date_id)
    {
        $order_user = $this->model->createOrderUser($user_id,$order_date_id);
        return $order_user;
    }

    public function getOrderUser($user_id,$order_date_id)
    {
        $order_user = $this->model->getOrderUser($user_id,$order_date_id);
        return $order_user;
    }

    public function getUsersByOrder($order_date_id)
    {
        $users = $this->model->getUsersByOrder($order_date_id);
        return $users;
    }
    // Actualizar el registro de la tabla order_user
    public function updateOrderUser($user_id,$order_date_id,$breakfast,$lunch,$dinner)
    {
        $order_user = $this->model->updateOrderUser($user_id,$order_date_id,$breakfast,$lunch,$dinner);
        return $order_user;
    }
}
?>