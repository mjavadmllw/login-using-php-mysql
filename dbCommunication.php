<?php

    function registration($username,$password,$email){
        $username=htmlspecialchars($username);
        $password=htmlspecialchars($password);
        $email=htmlspecialchars($email);
        try {
            include "confiq.php";
            $mysql=new mysqli($host,$dbusername,$dbpassword,$dbname);
            if($mysql->connect_error){
                throw new Exception("didn't connect to database...!!!");
            }
            $password=md5($password);
            $sql="INSERT INTO users(username,password,email)
             VALUES('$username','$password','$email')";
            $result=$mysql->query($sql);
            $mysql->close();
            
            if ($result){
                return true;
            } else {
                return false;
            }   
        } catch (Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    function duplicateChecker($newEmail){
        $newEmail=htmlspecialchars($newEmail);
        try {
            include "confiq.php";
            $mysql=new mysqli($host,$dbusername,$dbpassword,$dbname);
            if($mysql->connect_error){
                throw new Exception("didn't connect to database...!!!");
            }
            $sql="SELECT email FROM users WHERE email='$newEmail' ";
            $result=$mysql->query($sql);
            $data=$result->fetch_assoc();
            $mysql->close();
            
            if ($data){
                return true;
            } else {
                return false;
            }   
        } catch (Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    function authenticate($username, $password){
        $username=htmlspecialchars($username);
        $password=htmlspecialchars($password);
        try {
            include "confiq.php";
            $mysql=new mysqli($host,$dbusername,$dbpassword,$dbname);
            if($mysql->connect_error){
                throw new Exception("didn't connect to database...!!!");
            }
            $password=md5($password);
            $sql="SELECT * FROM users WHERE username='$username' and password='$password' ";
            $result=$mysql->query($sql);
            $data=$result->fetch_assoc();
            $mysql->close();
            
            if ($data){
                return $data;
            } else {
                return false;
            }   
        } catch (Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }