<?php
    $pageTitle = "Benutzer bearbeiten";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/includes/middle.php");

if (!isset($_GET['id'])) {
    die("Keine Benutzer-ID übergeben.");
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM lfvt4v2_login WHERE id = :id";
$statement = $connection->prepare($sql);
$statement->execute(['id' => $id]);
$user = $statement->fetch(PDO::FETCH_ASSOC);
require_once ($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/forms/benutzer-edit.form.php");

if (!$user) {
    die("Benutzer nicht gefunden.");
}

// Wenn Formular gesendet wurde
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $benutzername = $_POST['benutzername'];
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];

    $update = "UPDATE lfvt4v2_login 
               SET benutzername = :benutzername, vorname = :vorname, nachname = :nachname 
               WHERE id = :id";
    $statement = $connection->prepare($update);
    $statement->execute([
        'benutzername' => $benutzername,
        'vorname' => $vorname,
        'nachname' => $nachname,
        'id' => $id
    ]);

    header("Location: index.php?page=benutzerverwaltung");
    exit;
}


?>


