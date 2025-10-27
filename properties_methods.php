<?php

class Student{

    public $name; // this is called properties 
    public $age; // this is called properties 

    // setter and getter methods
    public function setData($name,$age){ // this is called methods when inside of class otherwise outside class it is called function
        $this->name=$name;
        $this->age=$age;
    }
    public function getData(){
        echo "Name: ",$this->name." Age: ".$this->age;
    }
}

$obj=new Student(); // creating object of class Student
$obj->setData("Kunal Chaudhary",22); // setting value to properties using setter method
$obj->getData();// getting value of properties using getter method

?>