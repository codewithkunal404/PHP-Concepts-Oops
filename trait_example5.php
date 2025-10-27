<?php


trait A{
    public function sayA(){
        echo "this is trait A";
    }
}
trait B{
    use A;
    public function sayB(){
        echo "this is trait B";
    }
}

class C {
    use B;
}

(new C)->sayA();
echo "<br>";
(new C)->sayB();
echo "<br>";

?>