<?php
session_start();

$benutzer = null;

if (isset($_SESSION['user'])) {
    if (is_array($_SESSION['user']) && isset($_SESSION['user']['benutzername'])) {
        $benutzer = htmlspecialchars($_SESSION['user']['benutzername']);
    } elseif (is_string($_SESSION['user'])) {
        $benutzer = htmlspecialchars($_SESSION['user']);
    }
}
