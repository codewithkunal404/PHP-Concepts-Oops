<?php

class school_login{


    private $email;
    private $password;


    public function setlogin($email,$password){// setter method
        $this->email=$email;
        $this->password=$password;
    }

    public function getlogin(){
        echo "Email: ".$this->email." Password: ".$this->password; // getter method
    }

}

$car= new school_login(); // creating object of class school_login
$car->setlogin("kunalchaudhary1331@gmail.com","kunal1234"); // setting email and password
$car->getlogin();// displaying email and password

?>