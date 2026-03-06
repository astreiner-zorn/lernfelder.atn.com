<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT MIN(lf08v2_modelle.tagesmietpreis) AS min_tagesmietpreis FROM lf08v2_modelle JOIN lf08v2_hersteller ON lf08v2_hersteller.herstellernr = lf08v2_modelle.herstellernr;
<?php include("middle.php"); ?>

<?php
    $sql = "SELECT MIN(lf08v2_modelle.tagesmietpreis) AS min_tagesmietpreis FROM lf08v2_modelle JOIN lf08v2_hersteller ON lf08v2_hersteller.herstellernr = lf08v2_modelle.herstellernr;";
    $ausgabe = $connection->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>Kleinster Tagesmietpreis</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo $inhalt['min_tagesmietpreis'] . "€"; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>