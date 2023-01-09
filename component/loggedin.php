<?php
session_start();

if(file_exists("install.php")){
    header("location: install.php");
}

if (isset($_SESSION['id'])) {
    header("location: index.php");
}