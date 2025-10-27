<?php

class Access_modifier{


    public $a="public data";
    private $b="protected data";
    protected $c="private data";


    public function display(){
        echo $this->a; // accessing public property
        echo "\n";
        echo $this->b; // accessing private property
        echo "\n";
        echo $this->c; // accessing protected property
    }
}

$obj= new Access_modifier();
$obj->display();
echo "<br>";
echo $obj->a;

echo "<br>";
// echo $obj->b; // can't access due to private access modifier

echo "<br>";
// echo $obj->c; // Can't access due to protected access modifier


?>