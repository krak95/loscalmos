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

public function loginUser(){
    if($this->emptyInput() == false){
        //echo empty input!;
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    $this->getUser($this->uname, $this->pw);
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




}

class SignupControl extends Signup
{
private $name; //variable goes inside construct function witout $ sign;
private $uname;
private $pw;
private $email;
private $pwR;

//inside constructor is data from input;
public function __construct($name, $uname, $email, $pw, $pwR){
    $this->name = $name;//first class data then input data.
    $this->uname = $uname;
    $this->pw = $pw;
    $this->email = $email;
    $this->pwR = $pwR;

}

private function emptyInput(){
    if(empty($this->name) || empty($this->uname) || empty($this->email) || empty($this->pw) || empty($this->pwR))
    {
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}

private function invalidUid(){
    if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uname))
    {
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}
private function uidTakenCheck(){
    if (!$this->checkUser($this->uname,$this->email))
    {
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}
private function pwdMatch(){
    if ($this->pw !== $this->pwR)
    {
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}
private function invalidEmail(){
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
    {
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}

public function signupUser(){
    if($this->emptyInput() == false){
        //echo empty input!;
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if($this->invalidUid()==false){
        //echo empty input!;
        header("location: ../index.php?error=invalidUid");
        exit();
    }
    if($this->invalidEmail()==false){
        //echo empty input!;
        header("location: ../index.php?error=invalidEmail");
        exit();
    }
    if($this->pwdMatch()==false){
        //echo empty input!;
        header("location: ../index.php?error=pwdMatch");
        exit();
    }
    if($this->uidTakenCheck()==false){
        //echo empty input!;
        header("location: ../index.php?error=uidTakenCheck");
        exit();
    }
    $this->setUser($this->name, $this->uname, $this->email, $this->pw);
}


}