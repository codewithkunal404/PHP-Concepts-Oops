<?php


trait Math{
    abstract  public function add();
    public function calculate(){
        echo "The Sum is ".$this->add();
    } 
}

class A{
    use Math;
    public function add(){
        return 5;
    }
}

$obj=new A();
$obj->calculate();

?>