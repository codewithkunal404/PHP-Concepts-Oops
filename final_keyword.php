<?php

// final keyword is used to prevent class inheritance or method overriding
// when a class is declared as final then it cannot be inherited by any other class
// when a method is declared as final then it cannot be overridden by any child class
// example of final class
final class ParentClass{
    public function display(){
        echo "This is a final class method";
    }   
}
// trying to inherit final class will result in error
class ChildClass extends ParentClass{ // will cause error

    public function show(){
        echo "This is child class method";
    }

    // public function display(){ // trying to override final class method will result in error
    //     echo "This is overridden method"; 
    // }
}
// example of final method


$obj=new ChildClass();
$obj->display(); // calling method of final class
$obj->show(); // calling child class method
?>