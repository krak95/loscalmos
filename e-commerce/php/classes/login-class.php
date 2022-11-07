<?php

class Login extends Dbh {

    protected function getUser($uname,$pwd){
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? OR email = ?');


        if(!$stmt->execute(array($uname,$pwd))){
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
            
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $checkpwdd = password_verify($pwd, $pwdHashed[0]['password']);

        if($checkpwdd == false){
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
            
        }elseif($checkpwdd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?');
            if(!$stmt->execute(array($uname,$uname,$pwd))){
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
            $_SESSION['user_id'] = $user[0]["user_id"];
            $_SESSION['username'] = $user[0]["username"];
            $_SESSION['admin'] = $user[0]['admin'];
            $_SESSION['email'] = $user[0]['email'];
        }
    }
    
}
