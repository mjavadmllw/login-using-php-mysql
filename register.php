<?php
    session_start();
    include "dbCommunication.php";

    if(isset($_POST['submit'])){
        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])){
            if(duplicateChecker($_POST['email'])){
                $error="Email has been registered before<br>Please use another email";
            }else{
                if (preg_match('/[^A-Za-z0-9]/', $_POST['username'])){
                    $error="Username must only have letters";
                } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $error="please enter a valid email";
                }else{
                    registration($_POST['username'],$_POST['password'],$_POST['email']);
                    header("location: login.php");
                }
            }
        }else{
            $error="Please enter all fileds";
        }
    }

    include __DIR__ . '/views/register.view.php';