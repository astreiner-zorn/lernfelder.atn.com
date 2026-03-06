<?php
    $pageTitle = "Benutzerverwaltung";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/includes/middle.php");
?>


<?php if (isset($benutzer)): ?>
    <?php
        $sql = "SELECT * FROM lfvt4v2_login";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $user = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="table-light">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Benutzername</th>
                    <th class="p-3">Vorname</th>
                    <th class="p-3">Nachname</th>
                    <th class="p-3">Aktion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $daten): ?>
                <tr>
                    <td class="p-3"><?= $daten['id']; ?></td>
                    <td class="p-3"><?= $daten['benutzername']; ?></td>
                    <td class="p-3"><?= $daten['vorname']; ?></td>
                    <td class="p-3"><?= $daten['nachname']; ?></td>
                    <td class="p-3">
                        <a class="nav-link" href="index.php?page=benutzer-edit&id=<?php echo $daten['id']; ?>">Bearbeiten</a>
                        <a class="nav-link" href="index.php?page=benutzer-delete&id=<?php echo $daten['id']; ?>">Löschen</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>