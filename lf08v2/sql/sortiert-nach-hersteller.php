<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT lf08v2_hersteller.herstellernr, lf08v2_hersteller.herstellername, lf08v2_fahrradarten.bezeichnung FROM lf08v2_hersteller JOIN lf08v2_fahrradarten ORDER BY `lf08v2_hersteller`.`herstellernr` ASC;

<?php include("middle.php"); ?>

<?php
    $sql = "SELECT lf08v2_hersteller.herstellernr, lf08v2_hersteller.herstellername, lf08v2_fahrradarten.bezeichnung FROM lf08v2_hersteller JOIN lf08v2_fahrradarten ORDER BY `lf08v2_hersteller`.`herstellernr` ASC;";
    $ausgabe = $connection->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>Herstellernummer</th>
            <th>Herstellername</th>
            <th>Bezeichnung</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo $inhalt['herstellernr']; ?></td>
                <td><?php echo $inhalt['herstellername']; ?></td>
                <td><?php echo $inhalt['bezeichnung']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>