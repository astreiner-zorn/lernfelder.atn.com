<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/includes/header.php"); ?>

<?php
// Standardseite setzen
$page = $_GET['page'] ?? '';
if ($page === '') {
    header("Location: index.php?page=index");
    exit();
}

// Pfad zur Datei
$filePath = $_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/pages/" . $page . ".page.php";
if (file_exists($filePath)) {
    include $filePath;
} else {
    require_once($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/includes/404.php");
}
?>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/includes/footer.php"); ?>