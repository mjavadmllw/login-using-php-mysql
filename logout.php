<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: login.php");
} elseif ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location: index.php");
}

unset($_SESSION['id']);
header("location: login.php");
