<?php

class Car
{
    private $id;
    private $model;
    private $pricePerDay;

    public function __construct($id, $model, $pricePerDay)
    {
        $this->id = $id;
        $this->model = $model;
        $this->pricePerDay = $pricePerDay;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPricePerDay()
    {
        return $this->pricePerDay;
    }
}
