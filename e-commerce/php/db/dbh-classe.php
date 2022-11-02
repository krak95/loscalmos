<?php

class Dbh {

    protected function connect(){
        try{
            $uname = 'root';
            $paw = '';
            $dbh = new PDO('mysql:host=localhost;dbname=onlineshop',$uname,$paw);
            return $dbh;
        }
        catch(PDOException $e){
            return $e;
        }
    }

}