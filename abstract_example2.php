<?php


abstract class Shape{
    abstract public function area();
    abstract public function perimeter(); // abstract method
}

class Circle extends Shape{
  
    private $radius;

    public function __construct($radius){
        $this->radius = $radius;
    }

    public function area(){
        return pi() * pow($this->radius, 2);
    }
    public function perimeter(){
        return 2 * pi() * $this->radius;
    }
}


class Rectangle extends Shape{
  
    private $length;
    private $width;

    public function __construct($length, $width){
        $this->length = $length;
        $this->width = $width;
    }

    public function area(){
        return $this->length * $this->width;
    }
    public function perimeter(){
        return 2 * ($this->length + $this->width);
    }
    
}

$obj=[new Circle(3), new Rectangle(4, 5)];

foreach($obj as $shape){
    echo get_class($shape) . "<br>";
    echo "Area: " . $shape->area() . "<br>";
    echo "Perimeter: " . $shape->perimeter() . "<br><br>";
}


?>