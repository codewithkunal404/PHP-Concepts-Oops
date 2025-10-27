<?php

class A{

    public function display(){
        echo "This is class A method";
    }
}
class B extends A{ // class B inherits class A

    public function display(){ // overriding parent class method
        echo "This is class B method";
        echo "<br>";
        parent::display();// if want use parent class method also
    }
}

$obj=new B();
$obj->display(); // calling overridden method

?>