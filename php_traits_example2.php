<?php


trait Logger {
    public $logFile = 'app.log';
    public function log($msg) {
        echo "Logging: $msg";
    }
    public static function status() {
        echo "Logger active";
    }
}


class A{
    use Logger;
}

$obj=new A();
echo $obj->logFile;
echo "<br>";
$obj->log("hello");
echo "<br>";
$obj->status();
?>