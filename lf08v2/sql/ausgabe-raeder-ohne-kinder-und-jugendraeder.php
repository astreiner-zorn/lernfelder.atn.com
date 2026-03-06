<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT lf08v2_fahrraeder.fahrradnr, lf08v2_modelle.bezeichnung AS modell_bezeichnung, lf08v2_fahrradarten.bezeichnung AS fahrradart_bezeichnung FROM lf08v2_fahrraeder JOIN lf08v2_modelle ON lf08v2_modelle.modellnr = lf08v2_fahrraeder.modellnr JOIN lf08v2_fahrradarten ON lf08v2_modelle.artnr = lf08v2_fahrradarten.artnr WHERE lf08v2_fahrradarten.bezeichnung NOT IN ('Kinderrad', 'Jugendrad');
<?php include("middle.php"); ?>

<?php
    $sql = "SELECT lf08v2_fahrraeder.fahrradnr, lf08v2_modelle.bezeichnung AS modell_bezeichnung, lf08v2_fahrradarten.bezeichnung AS fahrradart_bezeichnung FROM lf08v2_fahrraeder JOIN lf08v2_modelle ON lf08v2_modelle.modellnr = lf08v2_fahrraeder.modellnr JOIN lf08v2_fahrradarten ON lf08v2_modelle.artnr = lf08v2_fahrradarten.artnr WHERE lf08v2_fahrradarten.bezeichnung NOT IN ('Kinderrad', 'Jugendrad');";
    $ausgabe = $connection->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>Fahrradnummer</th>
            <th>Modellbezeichnung</th>
            <th>Fahrradbezeichnung</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo $inhalt['fahrradnr']; ?></td>
                <td><?php echo $inhalt['modell_bezeichnung']; ?></td>
                <td><?php echo $inhalt['fahrradart_bezeichnung']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>