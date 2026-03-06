<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $benutzerId = $_SESSION['user_id'];
    $benutzer = htmlspecialchars($_SESSION['user']);
}
?>