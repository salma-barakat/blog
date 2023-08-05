<?php
class User{
    public $id;
    public $Fname;
    public $Lname;
    public $email;
    private $password;
    public $registeredAt;

    public function __construct($Fname, $Lname, $email, $password){
        $this->Fname = $Fname;
        $this->Lname = $Lname;
        $this->email = $email;
        $this->password = $password;
    }

    
}