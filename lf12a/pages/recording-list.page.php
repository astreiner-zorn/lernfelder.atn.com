<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/database.php");
?>

<?php if (isset($benutzer)): ?>
    <?php
        $sql = "SELECT t.id, u.username, t.login_date, t.login_time, t.logout_date, t.logout_time
                FROM lf12a_timestamps t
                INNER JOIN lf12a_user u ON t.user_id = u.id
                ORDER BY t.id ASC";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

   <table class="table table-striped mt-4">
    <thead>
      <tr>
        <th class="p-3">Benutzer</th>
        <th class="p-3">Login Datum</th>
        <th class="p-3">Login Uhrzeit</th>
        <th class="p-3">Logout Datum</th>
        <th class="p-3">Logout Uhrzeit</th>
        <th class="p-3">Aktion</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $row): ?>
      <tr>
        <td class="p-3"><?= htmlspecialchars($row['username']) ?></td>
        <td class="p-3"><?= $row['login_date'] ? date('d.m.Y', strtotime($row['login_date'])) : '--' ?></td>
        <td class="p-3"><?= $row['login_time'] ? date('H:i:s', strtotime($row['login_time'])) : '--' ?></td>
        <td class="p-3"><?= $row['logout_date'] ? date('d.m.Y', strtotime($row['logout_date'])) : '--' ?></td>
        <td class="p-3"><?= $row['logout_time'] ? date('H:i:s', strtotime($row['logout_time'])) : '--' ?></td>
        <td class="p-3"><a class="text-danger fw-bold nav-link" href="index.php?page=recording-edit&id=<?php echo $row['id']; ?>">Korrigieren</a></td>
    </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>