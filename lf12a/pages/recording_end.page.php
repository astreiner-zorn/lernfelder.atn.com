<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/database.php");
// Arbeitszeit-Ende: setzt Logout-Datum/-Uhrzeit für den letzten offenen Eintrag
// Voraussetzung: $pdo (PDO) existiert und Session enthält Nutzer-ID

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Prüfen, ob ein Nutzer eingeloggt ist
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit;
}

$userId = (int) $_SESSION['user_id'];

try {
    // Das letzte offene Timestamp-Record ohne Logout für diesen User updaten
    $stmt = $pdo->prepare(
        'UPDATE lf12a_timestamps
         SET logout_date = CURDATE(), logout_time = CURTIME()
         WHERE user_id = :uid
           AND logout_date IS NULL
           AND logout_time IS NULL
         ORDER BY id DESC
         LIMIT 1'
    );
    $stmt->bindValue(':uid', $userId, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: index.php?page=index&stopped=1');
    exit;
} catch (PDOException $e) {
    // Optional: Fehler loggen
    // error_log($e->getMessage());
    header('Location: index.php?page=index&stopped=0&err=update');
    exit;
}