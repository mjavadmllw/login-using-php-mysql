<?php 
    session_start();
    include "install.php";

    if(isset($_SESSION['id'])){
        header("location: index.php");;
    };

    if (isset($_POST['submit'])) {
        $db_user= authenticate($_POST['username'], $_POST['password']);
        if (isset($_POST['username'], $_POST['password']) && $db_user){
            $_SESSION['id'] = $db_user['id'];
            header("location: index.php");
        } else {
            $error = "Username/Password is wrong!!";
        }
    }


    include __DIR__ . '/views/loginHtml.php';