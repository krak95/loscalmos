<?php 

class SignupControl extends Signup
{
private $name; //variable goes inside construct function witout $ sign;
private $uname;
private $pwd;
private $email;
private $pwdR;

//inside constructor is data from input;
public function __construct($name, $uname, $email, $pwd, $pwdR){
    $this->name = $name;//first class data then input data.
    $this->uname = $uname;
    $this->pwd = $pwd;
    $this->email = $email;
    $this->pwdR = $pwdR;

}

private function emptyInput(){
    if(empty($this->name) || empty($this->uname) || empty($this->email) || empty($this->pwd) || empty($this->pwdR))
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
private function pwddMatch(){
    if ($this->pwd !== $this->pwdR)
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
    if($this->pwddMatch()==false){
        //echo empty input!;
        header("location: ../index.php?error=pwddMatch");
        exit();
    }
    if($this->uidTakenCheck()==false){
        //echo empty input!;
        header("location: ../index.php?error=uidTakenCheck");
        exit();
    }
    $this->setUser($this->name, $this->uname, $this->email, $this->pwd);
}


}