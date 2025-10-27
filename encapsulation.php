<?php


class Bank{

    private $balance=0;


    public function __construct($balance){
        $this->balance=$balance;
    }

    public function deposit($money){
        $this->balance+=$money;
        return "Deposit sccessfully";
    }

    public function withdrawn($money){
        if($this->balance>0 && $money<$this->balance){
            $this->balance-=$money;
            return "WithDrawn Successfully";
        }
            return "Not Enough Balance";

       
    }

    public function getbalance(){
        echo "Current Balance is ".$this->balance;
    }
}


$obj=new Bank(200);
echo $obj->deposit(500);
echo "<br>";
echo $obj->withdrawn(1000);
echo "<br>";
$obj->getbalance();




?>