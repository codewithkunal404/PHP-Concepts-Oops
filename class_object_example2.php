<?php

class demo{

    public $model;
    public $brand;

    public function __construct($model,$brand){
        $this->model=$model;
        $this->brand=$brand;
    }

    public function display(){
        echo "Car Model: ".$this->model ." Brand: ".$this->brand;
    }

}

$maruti_car1= new demo("Swift","Maruti");
$maruti_car1->display();