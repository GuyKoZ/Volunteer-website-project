<?php
  
require_once('init.php');

class Session{
    private $signed_in;
    private $user_email;
    private $firstname;

    public function __construct(){
        session_start();
        $this->check_login();
    }
    
     private function check_login(){
        if (isset($_SESSION['email'])){
            $this->user_email=$_SESSION['email'];
            $this->firstname=$_SESSION['firstname'];
            $this->signed_in=true;
        }
        else{
            unset($this->user_email);
            $this->signed_in=false;
        }
    }

//    private function has_attribute($attribute)
//    {
//
//        $object_properties = get_object_vars($this);
//        return array_key_exists($attribute, $object_properties);
//    }
//
//    private function instantation($user_array)
//    {
//        foreach ($user_array as $attribute => $value) {
//            if ($this->has_attribute($attribute))
//                $this->$attribute = $value;
//        }
//    }

    public function login($user){
        if($user){
            $this->user_email=$user->email;
            $this->firstname=$user->firstname;
            $_SESSION['email']=$user->email;
            $_SESSION['firstname']=$user->firstname;
            $this->signed_in=true;
        }
    }
       
    public function logout(){
        echo 'logout';
        unset($_SESSION['email']);
        unset($this->user_email);
        $this->signed_in=false;
    }
    
    public function __get($property){
        if (property_exists($this,$property))
            return $this->$property;
    }
     
}
$session=new Session();


    
?>

