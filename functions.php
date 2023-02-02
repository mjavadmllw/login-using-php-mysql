<?php

    function registrer($username,$password,$email){
        $username=htmlspecialchars($username);
        $password=htmlspecialchars($password);
        $email=htmlspecialchars($email);
        $password=md5($password);

        try {
            include "confiq.php";
            $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $conn=$conn->prepare("INSERT INTO users (username, password,email) VALUES (?,?,?)");
            $conn->execute([$username,$password,$email]);

            $conn = null; 
            
            return true;
             
        } catch (Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    function duplicateChecker($newEmail){
        $newEmail=htmlspecialchars($newEmail);
        try {
            include "confiq.php";
            $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$newEmail]);
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $conn = null; 
            foreach ($data as $row) {
                if ($row['email']==$newEmail){
                    return true;
                } else {
                    return false;
                } 
            }   
        } catch (Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    function authenticate($username, $password){
        $username=htmlspecialchars($username);
        $password=htmlspecialchars($password);
        $password=md5($password);
        try {
            include "confiq.php";
            $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT id,username,password,email FROM users WHERE username = ? ");
            $stmt->execute([$username]);
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            $conn = null; 
            foreach ($data as $row) {
                if ($row['password']==$password){
                    return $row;
                }
            } 
             
        } catch (Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }