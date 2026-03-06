<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT lf08v2_fahrradarten.bezeichnung, COUNT(*) AS anzahl FROM lf08v2_fahrraeder JOIN lf08v2_modelle ON lf08v2_modelle.modellnr = lf08v2_fahrraeder.modellnr JOIN lf08v2_fahrradarten ON lf08v2_modelle.artnr = lf08v2_fahrradarten.artnr GROUP BY lf08v2_fahrradarten.bezeichnung;

<?php include("middle.php"); ?>

<?php
    $sql = "SELECT lf08v2_fahrradarten.bezeichnung, COUNT(*) AS anzahl FROM lf08v2_fahrraeder JOIN lf08v2_modelle ON lf08v2_modelle.modellnr = lf08v2_fahrraeder.modellnr JOIN lf08v2_fahrradarten ON lf08v2_modelle.artnr = lf08v2_fahrradarten.artnr GROUP BY lf08v2_fahrradarten.bezeichnung;";
    $ausgabe = $connection->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>Bezeichnung</th>
            <th>Anzahl</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo $inhalt['bezeichnung']; ?></td>
                <td><?php echo $inhalt['anzahl']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>