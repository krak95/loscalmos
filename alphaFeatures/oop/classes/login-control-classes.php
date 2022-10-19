<?php

class LoginControl extends Login
{
private $uname;
private $pw;

//inside constructor is data from input;
public function __construct($uname,$pw){
    $this->uname = $uname;
    $this->pw = $pw;

}

private function emptyInput(){
    if((empty($this->uname) || empty($this->pw)))
    {
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}

public function loginUser(){
    if($this->emptyInput() == false){
        //echo empty input!;
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    $this->getUser($this->uname, $this->pw);
}


}