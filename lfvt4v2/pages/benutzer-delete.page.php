<?php
$pageTitle = "Benutzer löschen";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/includes/middle.php");

if (!isset($_GET['id'])) {
    die("Keine Benutzer-ID übergeben.");
}

$id = (int) $_GET['id'];

// Prüfen, ob der Benutzer existiert
$sql = "SELECT * FROM lfvt4v2_login WHERE id = :id";
$statement = $connection->prepare($sql);
$statement->execute(['id' => $id]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Benutzer wurde nicht gefunden.");
} else {
    $sql = "DELETE FROM lfvt4v2_login WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->execute(['id' => $id]);

    header("Location: index.php?page=benutzerverwaltung");
    exit;
}
?>