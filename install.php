<?php
    include __DIR__ . '/confiq.php';
    include __DIR__ . '/functions.php';

    if(isset($_POST['submit'])){
        try {
            $conn = new PDO("mysql:host=$host", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
            $conn->exec($sql);
            $sql = "use $dbname";
            $conn->exec($sql);
            $sql = "CREATE TABLE IF NOT EXISTS users (
                        ID int(10) AUTO_INCREMENT PRIMARY KEY,
                        username varchar(16) NOT NULL,
                        password varchar(50) NOT NULL,
                        email varchar(50) NOT NULL)";
            $conn->exec($sql);
            registrer($_POST['username'],$_POST['password'],$_POST['email']);
            echo "<h3 style='text-align: center;padding-top:50px;'>DB:$dbname & TABLE:users => created successfully</h3>";
            
            unlink("install.php");
            header("location: index.php");
            
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    
    }

    
    echo "<h4 style='text-align: center;padding-top:10px;'>please enter your admin details:</h4>";
    include __DIR__ . '/views/register.view.php'
?>