<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT lf08v2_fahrraeder.fahrradnr, lf08v2_fahrraeder.anschaffungswert, lf08v2_fahrradarten.bezeichnung FROM lf08v2_fahrraeder JOIN lf08v2_fahrradarten ON lf08v2_fahrraeder.modellnr = lf08v2_fahrradarten.artnr ORDER BY lf08v2_fahrraeder.fahrradnr ASC;

<?php include("middle.php"); ?>

<?php
    $sql = "SELECT lf08v2_fahrraeder.fahrradnr, lf08v2_fahrraeder.anschaffungswert, lf08v2_fahrradarten.bezeichnung FROM lf08v2_fahrraeder JOIN lf08v2_fahrradarten ON lf08v2_fahrraeder.modellnr = lf08v2_fahrradarten.artnr ORDER BY lf08v2_fahrraeder.fahrradnr ASC;";
    $ausgabe = $connection->query($sql);
?>
<table>
    <thead>
        <tr>
            <th>Fahrradnummer</th>
            <th>Anschaffungswert</th>
            <th>Bezeichnung</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo $inhalt['fahrradnr']; ?></td>
                <td><?php echo $inhalt['anschaffungswert'] . "€"; ?></td>
                <td><?php echo $inhalt['bezeichnung']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>