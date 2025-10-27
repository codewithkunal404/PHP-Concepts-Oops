
<?php

//  parent and self keyword in php
// self keyword is used to access static members (properties and methods) of the same class , we can't use $this keyword to access static members and we use self keyword with scope resolution operator (::) to access static members / we cannot not inherit static members using self keyword
// parent keyword is used to access members (properties and methods) of parent class from child class



class A{

    public static $a="static property of class A"; // public static property
    
    public function greet(){
        echo "Hello from class A";
    }

    public static function display(){
        echo "static method of class A <br> property value is: ".self::$a;
    }

}
class B extends A{

    public function greet(){
        echo "Hello from class B <br>";
        parent::greet(); // calling parent class method using parent keyword
    }

    public function show(){
        echo "<br>";
        parent::display(); // calling parent class static method using parent keyword
    }

}

$obj=new B();
A::$a="Modified static property of class A"; // modifying static property of class A / it can be modified without creating object of class A
$obj->greet(); // calling child class method
$obj->show(); // calling child class method which calls parent class static method



?>