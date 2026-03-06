<?php
ob_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/session.php");
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/database.php");
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praxisprojekt</title>

    <!-- Bootstrap CSS -->
    <link href="https://codevoyage.alttrifftneu.com/4.0.0/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--- Custom CSS -->
    <link rel="stylesheet" href="/lf12a/includes/style.css">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Sven Oliver Berger</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse p-2 my-2" id="navbarNav">
                <ul class="navbar-nav">
                    <a class="nav-link" href="index.php?page=index">Startseite</a>
                    <?php if (!isset($_SESSION['user'])): ?>
                        <a class="nav-link" href="index.php?page=login">Login</a>
                    <?php else: ?>
                        <a class="nav-link" href="index.php?page=logout">Logout</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrationsbereich</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=users">Benutzerverwaltung</a></li>
                                <li><a class="dropdown-item" href="index.php?page=recording-list">Stempelzeiten anzeigen</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-success text-white text-center py-5">
        <div class="container">
            <h1>LF12a - Kundenspezifische Anwendungsentwicklung durchführen</h1>
            <p class="lead">Praxisprojekt: Zeiterfassungssystem</p>
        </div>
    </header>

    <!-- Hauptinhalt -->
    <main class="container border bg-light rounded shadow-sm my-3 py-3">
        <div class="p-2">