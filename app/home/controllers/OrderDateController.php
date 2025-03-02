<?php
require_once(__DIR__.'/../model/OrderDate.php');

class OrderDateController
{
    private $model;

    public function __construct()
    {
        $this->model = new OrderDateModel();
    }
    // Crear orden de fecha
    public function createOrderDate($date,$area_id)
    {
        $order_date = $this->model->createOrderDate($date,$area_id);
        return $order_date;
    }
    // Obtener id de orden por la fecha
    public function getOrderDateId($date)
    {
        $order_date = $this->model->getOrderDateId($date);
        return $order_date;
    }

    public function getOrderDate($date,$area_id)
    {
        $order_date = $this->model->getOrderDate($date,$area_id);
        return $order_date;
    }

    public function listOrderDate($area_id)
    {
        $order_date = $this->model->listOrderDate($area_id);
        return $order_date;
    }
    public function getOrderDateById($order_date)
    {
        $order_date = $this->model->getOrderDateById($order_date);
        return $order_date;
    }
}
?>