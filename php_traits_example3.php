<?php

trait A {
    public function sayHello() { echo "Hello from A"; }
}

trait B {
    public function sayHello() { echo "Hello from B"; }
}

class MyClass {
    use A, B {
        A::sayHello insteadof B;
        B::sayHello as sayHelloFromB;
    }
}

$obj = new MyClass();
$obj->sayHello();    // Hello from A
echo "<br>";
$obj->sayHelloFromB();   // Hello from B


?>