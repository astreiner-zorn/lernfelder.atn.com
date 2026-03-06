<?php

declare(strict_types=1);

require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/database.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/session.php");

if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php?page=login');
  exit;
}

// CSRF-Token prüfen (aus der URL, kein Formular nötig)
$token = $_GET['token'] ?? '';
if (!$token || !hash_equals($_SESSION['del_token'] ?? '', $token)) {
  http_response_code(403);
  echo 'Ungültiges Token.';
  exit;
}
// Token nur einmal benutzen
unset($_SESSION['del_token']);

$userId = (int) $_SESSION['user_id'];

// optionale Zeitraumauswahl aus der URL (Y-m-d)
$start = isset($_GET['start']) && $_GET['start'] !== '' ? $_GET['start'] : null;
$end   = isset($_GET['end'])   && $_GET['end']   !== '' ? $_GET['end']   : null;

// Validate dates
$valid = function ($v) {
  $d = DateTime::createFromFormat('Y-m-d', (string)$v);
  return $d && $d->format('Y-m-d') === $v;
};
if ($start && !$valid($start)) $start = null;
if ($end   && !$valid($end))   $end   = null;
if ($start && $end && $start > $end) {
  [$start, $end] = [$end, $start];
}

$where = "WHERE user_id = :uid";
if ($start) $where .= " AND login_date >= :start";
if ($end)   $where .= " AND login_date <= :end";

$sql = "DELETE FROM lf12a_timestamps $where";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':uid', $userId, PDO::PARAM_INT);
if ($start) $stmt->bindValue(':start', $start);
if ($end)   $stmt->bindValue(':end',   $end);
$stmt->execute();

$deleted = $stmt->rowCount();

// zurück zur Übersicht, Filter wieder anfügen
$q = [];
if ($start) $q[] = 'start=' . urlencode($start);
if ($end)   $q[] = 'end=' . urlencode($end);
$q[] = 'deleted=' . $deleted;
header('Location: /lf12a/index.php?page=index&' . implode('&', $q));
exit;
