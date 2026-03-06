<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT lf08v2_fahrraeder.fahrradnr, lf08v2_fahrradarten.bezeichnung, lf08v2_hersteller.herstellername FROM lf08v2_fahrraeder JOIN lf08v2_modelle ON lf08v2_fahrraeder.modellnr = lf08v2_modelle.modellnr JOIN lf08v2_fahrradarten ON lf08v2_modelle.artnr = lf08v2_fahrradarten.artnr JOIN lf08v2_hersteller ON lf08v2_modelle.herstellernr = lf08v2_hersteller.herstellernr WHERE lf08v2_fahrradarten.bezeichnung = 'Kinderrad';
<?php include("middle.php"); ?>

<?php
    $sql = "SELECT lf08v2_fahrraeder.fahrradnr, lf08v2_fahrradarten.bezeichnung, lf08v2_hersteller.herstellername FROM lf08v2_fahrraeder JOIN lf08v2_modelle ON lf08v2_fahrraeder.modellnr = lf08v2_modelle.modellnr JOIN lf08v2_fahrradarten ON lf08v2_modelle.artnr = lf08v2_fahrradarten.artnr JOIN lf08v2_hersteller ON lf08v2_modelle.herstellernr = lf08v2_hersteller.herstellernr WHERE lf08v2_fahrradarten.bezeichnung = 'Kinderrad';";
    $ausgabe = $connection->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>Fahrradnummer</th>
            <th>Bezeichnung</th>
            <th>Herstellername</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo $inhalt['fahrradnr']; ?></td>
                <td><?php echo $inhalt['bezeichnung']; ?></td>
                <td><?php echo $inhalt['herstellername']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>