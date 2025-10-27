<?php

class Father{ // parent class

    public function showMessage(){
        echo "This is Father class method";
    }
}

class Son extends Father{ // inheritance is done using 'extends' keyword / can't inherit private members of parent class / can't multiple inheritance in PHP BY LIKE class Son extends Father, Mother (not allowed in PHP)
    public function display(): void{
        echo "<br>";
        echo "This is Son class method";
    }
}

$child=new Son();
$child->showMessage(); // calling parent class method
$child->display(); // calling child class method
?>