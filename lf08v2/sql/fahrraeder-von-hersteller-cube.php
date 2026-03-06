<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT bezeichnung, herstellernr, herstellername FROM lf08v2_hersteller JOIN lf08v2_fahrradarten WHERE herstellername LIKE 'Cube';

<?php include("middle.php"); ?>

<?php
    $sql = "SELECT bezeichnung, herstellernr, herstellername FROM lf08v2_hersteller JOIN lf08v2_fahrradarten WHERE herstellername LIKE 'Cube';";
    $ausgabe = $connection->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>Bezeichnung</th>
            <th>Herstellernummer</th>
            <th>Herstellername</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo $inhalt['bezeichnung']; ?></td>
                <td><?php echo $inhalt['herstellernr']; ?></td>
                <td><?php echo $inhalt['herstellername']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>