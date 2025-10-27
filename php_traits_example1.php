<?php
trait message{

    public function success(){
        echo "this is an success message";
    }

    public function error(){
        echo "this is an error message";
    }
}

class A{

    use message;
}

$obj=new A();
$obj->success();
$obj->error();
?>