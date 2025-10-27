<?php


class Counter{

    public static $count=0;// static member variable

    public static function increment(){ // static member function
        self::$count++;
    }

    public static function displayCount(){  // static member function
        echo "Count: ".self::$count;
    } 
}

Counter::increment(); // static member not destroyed after function execution
Counter::increment(); 
Counter::displayCount();
?>