<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/database.php");
?>

<form method="GET" class="row g-3 align-items-end mt-3 mb-2">
    <input type="hidden" name="page" value="index">
    <div class="col-md-4">
      <label for="start" class="form-label mb-0">Von (Datum)</label>
      <input type="date" id="start" name="start" class="form-control"
             value="<?= isset($_GET['start']) ? htmlspecialchars($_GET['start']) : '' ?>">
    </div>
    <div class="col-md-4 justify-content-end">
      <label for="end" class="form-label mb-0">Bis (Datum)</label>
      <input type="date" id="end" name="end" class="form-control"
             value="<?= isset($_GET['end']) ? htmlspecialchars($_GET['end']) : '' ?>">
    </div>
    <div class="col-md-4">
      <button type="submit" class="btn btn-primary">Filtern</button>
      <a href="index.php?page=index" class="btn btn-outline-secondary">Zurücksetzen</a>
    </div>
  </form>


    <?php
    // Filter-Parameter validieren
    $start = isset($_GET['start']) && $_GET['start'] !== '' ? $_GET['start'] : null;
    $end   = isset($_GET['end']) && $_GET['end'] !== '' ? $_GET['end'] : null;

    $validDate = function ($v) {
        $dt = DateTime::createFromFormat('Y-m-d', $v ?? '');
        return $dt && $dt->format('Y-m-d') === $v;
    };

    if ($start && !$validDate($start)) { $start = null; }
    if ($end   && !$validDate($end))   { $end   = null; }

    // Falls beide gesetzt und vertauscht, korrigieren
    if ($start && $end && $start > $end) {
        [$start, $end] = [$end, $start];
    }

    $where = "WHERE user_id = :uid";
    if ($start) { $where .= " AND login_date >= :start"; }
    if ($end)   { $where .= " AND login_date <= :end"; }

    $sql = "
      SELECT id, login_date, login_time, logout_date, logout_time
      FROM lf12a_timestamps
      $where
      ORDER BY login_date DESC, login_time DESC
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':uid', (int)$_SESSION['user_id'], PDO::PARAM_INT);
    if ($start) { $stmt->bindValue(':start', $start); }
    if ($end)   { $stmt->bindValue(':end',   $end); }

    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>