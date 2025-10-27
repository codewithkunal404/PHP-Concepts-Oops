<?php


class parentClass
{

    public $a = "public data from parent class";
    private $b = "private data from parent class";
    protected $c = "protected data from parent class";


    public function display1()
    {
        echo $this->a; // accessing public property
        echo "<br>";
        echo $this->b; // accessing private property
        echo "<br>";

        echo $this->c; // accessing protected propertys
    }
}

class childClass extends parentClass
{

    public function display2()
    {
        echo "<br>";
        echo $this->a; // accessing public property
        echo "<br>";

        // echo $this->b; // can't access due to private access modifier
        // echo "\n";
        echo $this->c; // accessing protected property
    }
}


$obj1 = new childClass();
$obj1->display1();
$obj1->display2();
?>