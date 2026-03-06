<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT COUNT(*) FROM lf08v2_modelle JOIN lf08v2_hersteller ON lf08v2_hersteller.herstellernr = lf08v2_modelle.herstellernr WHERE lf08v2_hersteller.herstellername = 'Scott';

<?php include("middle.php"); ?>

<?php
    $sql = "SELECT COUNT(*) AS anzahl_fahrraeder FROM lf08v2_modelle JOIN lf08v2_hersteller ON lf08v2_hersteller.herstellernr = lf08v2_modelle.herstellernr WHERE lf08v2_hersteller.herstellername = 'Scott';";
    $ausgabe = $connection->query($sql);
?>
<table>
    <thead>
        <tr>
            <th>Anzahl der Fahrräder der Firma Scott</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo $inhalt['anzahl_fahrraeder']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>