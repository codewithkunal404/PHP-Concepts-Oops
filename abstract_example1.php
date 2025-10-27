<?php
abstract class Shape{
    public abstract function area(); // abstract method
    public function display(){ // regular method
        echo "This is shape class";
    }
}
class Circle extends Shape{
    public function area(){
        echo "Area of Circle is πr²";
    }

}
// $obj=new Shape(); // can't create object of abstract class
$obj=new Circle(); // creating object of child class
$obj->area(); // calling abstract method
echo "<br>";
$obj->display(); // calling regular method of abstract class

?>