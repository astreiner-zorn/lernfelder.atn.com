<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/database.php");

if (!isset($_GET['id'])) {
    die("Keine Benutzer-ID übergeben.");
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM lf12a_user WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->execute(['id' => $id]);
$user = $statement->fetch(PDO::FETCH_ASSOC);
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/forms/user-edit.form.php");

if (!$user) {
    die("Benutzer nicht gefunden.");
}

// Wenn Formular gesendet wurde
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];

    $update = "UPDATE lf12a_user
               SET username = :username
               WHERE id = :id";
    $statement = $pdo->prepare($update);
    $statement->execute([
        'username' => $username,
        'id' => $id
    ]);

    header("Location: /lf12a/index.php?page=users");
    exit;
}
