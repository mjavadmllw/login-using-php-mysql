<?php
include __DIR__ . "/component/loggedout.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location: index.php");
}

unset($_SESSION['id']);
header("location: login.php");
