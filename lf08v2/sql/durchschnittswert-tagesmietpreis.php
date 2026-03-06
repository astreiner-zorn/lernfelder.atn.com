<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT AVG(lf08v2_modelle.tagesmietpreis) AS durchschnitt_tagesmietpreis FROM lf08v2_modelle JOIN lf08v2_fahrradarten ON lf08v2_modelle.artnr = lf08v2_fahrradarten.artnr WHERE lf08v2_fahrradarten.bezeichnung = 'Kinderrad';

<?php include("middle.php"); ?>

<?php
    $sql = "SELECT AVG(lf08v2_modelle.tagesmietpreis) AS durchschnitt_tagesmietpreis FROM lf08v2_modelle JOIN lf08v2_fahrradarten ON lf08v2_modelle.artnr = lf08v2_fahrradarten.artnr WHERE lf08v2_fahrradarten.bezeichnung = 'Kinderrad';";
    $ausgabe = $connection->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>Durchschnitt (Tagesmietpreis) der Kinderräder</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo $inhalt['durchschnitt_tagesmietpreis'] . "€"; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>