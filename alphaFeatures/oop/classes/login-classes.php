<?php

class Login extends Dbh {

    protected function getUser($uname,$pw){
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? OR email = ?');


        if(!$stmt->execute(array($uname,$pw))){
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
            
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwHashed = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pw, $pwHashed[0]['password']);

        if($checkPwd == false){
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
            
        }elseif($checkPwd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;');
            if(!$stmt->execute(array($uname,$uname,$pw))){
                $stmt = null;
                header("location:../index.php?error=stmtfailed");
                exit();
                
            }
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
            }

            $user = $stmt->fetchALL(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['id'] = $user[0]["id"];
            $_SESSION['username'] = $user[0]["username"];
        }
    }
    
}