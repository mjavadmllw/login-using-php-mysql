<?php
    session_start();
    include "install.php";

    if(isset($_POST['submit'])){
        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])){
            if(duplicateChecker($_POST['email'])){
                $error="Email has been registered before<br>Please use another email";
            }else{
                registration($_POST['username'],$_POST['password'],$_POST['email']);
                header("location: login.php");
            }
        }else{
            $error="Please enter all fileds";
        }
    }



    include __DIR__ . '/views/register.view.php';