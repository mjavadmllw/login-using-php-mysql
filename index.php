<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("location: login.php");
}

include __DIR__ . '/views/dashboradHtml.php';