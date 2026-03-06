<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/database.php");
// pages/benutzer-delete.page.php
// Verhindert, dass ein eingeloggter Benutzer sich selbst löscht

// 2) Prüfen, ob ID übergeben wurde
if (!isset($_GET['id'])) {
    die("Keine Benutzer-ID übergeben.");
}

$id = (int) $_GET['id'];
$isthatyou   = $benutzer ?? null;

if ($isthatyou === null) {
    header('Location: /index.php?page=login');
    exit;
}

if ($isthatyou === $id) {
    die("<p><span class='text-danger fw-bold'>Fehler:</span> Du kannst deinen eigenen Account nicht löschen.<br>Bitte melde dich zuerst ab oder kontaktiere einen Administrator.</p>");
}

$sql = "SELECT * FROM lf12a_user WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->execute(['id' => $id]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Benutzer wurde nicht gefunden.");
}

$sql = "DELETE FROM lf12a_user WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->execute(['id' => $id]);

header("Location: index.php?page=users");
exit;