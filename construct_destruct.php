<?php


class demo{

    public function __construct(){// constructor method called automatically when object is created
        echo "This is constructor method";
    }

    public function __destruct(){ // destructor method called automatically when object is destroyed
        echo " This is destructor method";
    }

}

$obj= new demo();// creating object of class demo and constructor method called automatically
// destructor method will be called automatically at the end of the script or when object is destroyed



?>