
<?php
class Signup extends Dbh {
    protected function setUser($name,$uname,$pwd,$email){
        $stmt = $this->connect()->prepare('INSERT INTO users (name,username,password,email) VALUES(?,?,?,?);');

        $hashedpwd = password_hash($pwd,PASSWORD_DEFAULT);

        if(!$stmt->execute(array($name,$uname,$hashedpwd,$email))){
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
            
        }
        $stmt = null;
    }
    
    protected function checkUser($uname,$email){
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?');

        if(!$stmt->execute(array($uname,$email))){
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
            
        }
        
        if($stmt->rowCount()>0){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }

        return $resultCheck;
    }
}