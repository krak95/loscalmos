<?php

class LoginControl extends Login
{
private $uname;
private $pwd;

//inside constructor is data from input;
public function __construct($uname,$pwd){
    $this->uname = $uname;
    $this->pwd = $pwd;

}

public function loginUser(){
    if($this->emptyInput() == false){
        //echo empty input!;
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    $this->getUser($this->uname, $this->pwd);
}

private function emptyInput(){
    if((empty($this->uname) || empty($this->pwd)))
    {
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}




}