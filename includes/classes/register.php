<?php
  
require_once('init.php');

class Register{
    private $signed_in;
    private $user_id;
    
    
    public function __construct(){
        session_start();
        $this->check_login();
    }
    
     private function check_login(){
        if (isset($_SESSION['user_id'])){
            $this->user_id=$_SESSION['user_id'];
            $this->signed_in=true;
        }
        else{
            unset($this->user_id);
            $this->signed_in=false;
        }
    }
    
    public function login($user){
        if($user){
            $this->user_id=$user->id;
            $_SESSION['user_id']=$user->id;
            $this->signed_in=true;
        }
    }
}