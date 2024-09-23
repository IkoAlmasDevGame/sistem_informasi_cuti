<?php 
namespace controller;
use model\employee;

class Authentication {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new employee($konfig);
    }

    public function Login(){
        $userInput = htmlspecialchars(strip_tags($_POST['userInput']));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        $data = $this->konfig->SignIn($userInput,$password);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

?>