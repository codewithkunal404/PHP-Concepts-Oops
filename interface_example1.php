<?php


interface Message{
 
    public function send($msg);
    
}


class GoogleEmail implements Message{

    public function send($msg){
        echo "Send message Via GoogleEmail : $msg";
    }
}

class SMS implements Message{
    public function send($msg){
        echo "Send message Via SMS : $msg";
    }
}



//  dependency injection

function process(Message $obj,$msg){
    echo $obj->send($msg);
}

process(new GoogleEmail(),"hello kunal");
echo "<br>";
process(new SMS(),"hello Rahul");
?>