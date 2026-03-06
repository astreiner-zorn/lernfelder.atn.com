<!DOCTYPE html>  
<html lang="de">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>LF08 v2</title>  
    <link rel="stylesheet" href="includes/styles.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<?php 
$section_beginn = "<div class='section'>";
$section_ende = "</div>";
?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/database.php"); ?>

<body>
<div class="container">
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/seitenleiste.php"); ?>

<div class="main-content">
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/navigation.php"); ?>