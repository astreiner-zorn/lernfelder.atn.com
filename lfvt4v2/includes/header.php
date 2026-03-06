<?php
ob_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/includes/session.php");
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/includes/database.php");
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if (isset($pageTitle)) {
            echo $pageTitle . " | LF-VT v2";
        } else {
            echo "LF-VT v2";
        }
        ?>
    </title>

    <!-- Bootstrap CSS -->
    <link href="https://codevoyage.alttrifftneu.com/4.0.0/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Highlight.js CSS (Theme) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">


    <!--- Custom CSS -->
    <link rel="stylesheet" href="/lfvt4v2/includes/style.css">
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mein Account</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=logout">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrationsbereich</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=benutzerverwaltung">Benutzerverwaltung</a></li>
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
            <h1>LF-VT4 v2</h1>
            <p class="lead">Datenbanken und SQL</p>
        </div>
    </header>

    <!-- Hauptinhalt -->
    <main class="container border bg-light rounded shadow-sm my-5 p-3">
        <div class="mt-3 pt-2 pb-2">
            <?php $sql = ""; ?>