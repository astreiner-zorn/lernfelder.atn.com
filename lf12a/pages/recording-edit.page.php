<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/database.php");

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Sicherstellen, dass nur eingeloggte Benutzer/Administratoren bearbeiten dürfen
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit;
}

// ID aus GET prüfen
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='alert alert-danger'>Ungültige ID.</div>";
    exit;
}

$id = (int) $_GET['id'];

// Falls Formular abgesendet wurde → Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login_date  = $_POST['login_date'] ?? null;
    $login_time  = $_POST['login_time'] ?? null;
    $logout_date = $_POST['logout_date'] ?? null;
    $logout_time = $_POST['logout_time'] ?? null;

    $sql = "UPDATE lf12a_timestamps 
            SET login_date = :login_date, 
                login_time = :login_time, 
                logout_date = :logout_date, 
                logout_time = :logout_time
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':login_date'  => $login_date ?: null,
        ':login_time'  => $login_time ?: null,
        ':logout_date' => $logout_date ?: null,
        ':logout_time' => $logout_time ?: null,
        ':id'          => $id
    ]);

    header("Location: index.php?page=recording-list");
    exit;
}

// Datensatz laden
$sql = "SELECT * FROM lf12a_timestamps WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$entry = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$entry) {
    echo "<div class='alert alert-danger'>Datensatz nicht gefunden.</div>";
    exit;
}
?>

<form method="post" class="row g-3">
  <div class="col-md-6">
    <label for="login_date" class="form-label">Login Datum</label>
    <input type="date" name="login_date" id="login_date" class="form-control"
           value="<?= htmlspecialchars($entry['login_date'] ?? '') ?>">
  </div>
  <div class="col-md-6">
    <label for="login_time" class="form-label">Login Uhrzeit</label>
    <input type="time" name="login_time" id="login_time" class="form-control"
           value="<?= htmlspecialchars($entry['login_time'] ?? '') ?>">
  </div>
  <div class="col-md-6">
    <label for="logout_date" class="form-label">Logout Datum</label>
    <input type="date" name="logout_date" id="logout_date" class="form-control"
           value="<?= htmlspecialchars($entry['logout_date'] ?? '') ?>">
  </div>
  <div class="col-md-6">
    <label for="logout_time" class="form-label">Logout Uhrzeit</label>
    <input type="time" name="logout_time" id="logout_time" class="form-control"
           value="<?= htmlspecialchars($entry['logout_time'] ?? '') ?>">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Speichern</button>
    <a href="index.php?page=recording-list" class="btn btn-secondary">Abbrechen</a>
  </div>
</form>