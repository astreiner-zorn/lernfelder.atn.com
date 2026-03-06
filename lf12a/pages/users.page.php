<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/database.php");
?>

<?php if (isset($benutzer)): ?>
    <?php
        $sql = "SELECT * FROM lf12a_user";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $user = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="d-flex justify-content-end">
    <div class="row">
      <div class="col-md-auto">
        <button type="button" class="btn btn-success" onclick="location.href='index.php?page=user-add'">
          Benutzer hinzufügen
        </button>
      </div>
    </div>
  </div>

    <div class="table-responsive mt-5">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="table-light">
                <tr>
                    <th class="p-2">ID</th>
                    <th class="p-2">Benutzername</th>
                    <th class="p-2">Aktion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $daten): ?>
                <tr>
                    <td class="p-3"><?= $daten['id']; ?></td>
                    <td class="p-3"><?= $daten['username']; ?></td>
                    <td class="p-3">
                        <a class="nav-link" href="index.php?page=user-edit&id=<?php echo $daten['id']; ?>">Bearbeiten</a>
                        <a class="nav-link" href="index.php?page=user-delete&id=<?php echo $daten['id']; ?>">Löschen</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>