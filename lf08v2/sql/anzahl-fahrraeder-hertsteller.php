<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT lf08v2_hersteller.herstellername, COUNT(lf08v2_hersteller.herstellername) AS anzahl FROM lf08v2_fahrraeder JOIN lf08v2_modelle ON lf08v2_modelle.modellnr = lf08v2_fahrraeder.modellnr JOIN lf08v2_hersteller ON lf08v2_modelle.herstellernr = lf08v2_hersteller.herstellernr GROUP BY lf08v2_hersteller.herstellername;
<?php include("middle.php"); ?>

<?php
    $sql = "SELECT lf08v2_hersteller.herstellername, COUNT(lf08v2_hersteller.herstellername) AS anzahl FROM lf08v2_fahrraeder JOIN lf08v2_modelle ON lf08v2_modelle.modellnr = lf08v2_fahrraeder.modellnr JOIN lf08v2_hersteller ON lf08v2_modelle.herstellernr = lf08v2_hersteller.herstellernr GROUP BY lf08v2_hersteller.herstellername;";
    $ausgabe = $connection->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>Herstellername</th>
            <th>Anzahl</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo $inhalt['herstellername']; ?></td>
                <td><?php echo $inhalt['anzahl']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>