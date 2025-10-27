<?php
trait Logger {
    public function log($message) {
        echo "[LOG] $message" . PHP_EOL;
    }
}

trait Timestamp {
    public function timestamp() {
        return date('Y-m-d H:i:s');
    }
}

class Order {
    use Logger, Timestamp;
    public function create() {
        $this->log("Order created at " . $this->timestamp());
    }
}

$order = new Order();
$order->create();

?>