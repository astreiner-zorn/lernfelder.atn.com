<?php if (isset($_SESSION['user_id'])): ?>
  <div class="d-flex justify-content-between">
    <div>
      <button type="button" class="btn btn-success me-2" onclick="location.href='index.php?page=recording_start'">Arbeitszeit starten</button>
      <button type="button" class="btn btn-warning" onclick="location.href='index.php?page=recording_end'">Arbeitszeit beenden</button>
    </div>

    <div>
      <button type="button" class="btn btn-info text-light me-2" onclick="location.href='export_timestamps.php?start=<?= urlencode($_GET['start'] ?? '') ?>&end=<?= urlencode($_GET['end'] ?? '') ?>'">Stempelzeiten exportieren</button>
      <?php $_SESSION['del_token'] = bin2hex(random_bytes(16)); ?>
      <button type="button" class="btn btn-danger" onclick="if (confirm('Bist du sicher? Dieser Vorgang kann nicht rückgängig gemacht werden.')) { location.href = 'delete_timestamps.php?token=<?= urlencode($_SESSION['del_token']) ?>' + '&start=<?= urlencode($_GET['start'] ?? '') ?>' + '&end=<?= urlencode($_GET['end'] ?? '') ?>'; } ">
        Stempelzeiten löschen
      </button>

    </div>
  </div>

  <?php
  require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/forms/recording-filter.form.php");
  if (!isset($rows) || !is_array($rows)) {
    $rows = [];
  }
  ?>

  <table class="table table-striped mt-5">
    <thead>
      <tr>
        <th class="p-3">Datum: Login</th>
        <th class="p-3">Uhrzeit: Login</th>
        <th class="p-3">Datum : Logout</th>
        <th class="p-3">Uhrzeit: Logout</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $row): ?>
        <tr>
          <td class="p-3"><?= $row['login_date'] ? date('d.m.Y', strtotime($row['login_date'])) : '--' ?></td>
          <td class="p-3"><?= $row['login_time'] ? date('H:i:s', strtotime($row['login_time'])) : '--' ?></td>
          <td class="p-3"><?= $row['logout_date'] ? date('d.m.Y', strtotime($row['logout_date'])) : '--' ?></td>
          <td class="p-3"><?= $row['logout_time'] ? date('H:i:s', strtotime($row['logout_time'])) : '--' ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/pages/login.page.php"); ?>
<?php endif; ?>