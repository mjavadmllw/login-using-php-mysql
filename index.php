<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: login.php");
} elseif ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location: index.php");
}

include __DIR__ . '/views/dashborad.view.php';