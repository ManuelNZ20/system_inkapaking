<?php

require_once(__DIR__.'/../model/Area.php');

class AreaController
{
    private $model;

    public function __construct()
    {
        $this->model = new AreaModel();
    }

    public function getAreas()
    {
        $areas = $this->model->getAreas();
        return $areas;
    }

    public function getAreaIdByUser($user_id)
    {
        $area = $this->model->getAreaIdByUser($user_id);
        return $area;
    }
}
?>