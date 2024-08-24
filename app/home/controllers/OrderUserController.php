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
}
?>