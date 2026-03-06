<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT MAX(lf08v2_modelle.tagesmietpreis) AS hoechster_tagesmietpreis, lf08v2_modelle.bezeichnung FROM lf08v2_modelle JOIN lf08v2_fahrradarten WHERE lf08v2_fahrradarten.bezeichnung = 'Kinderrad';

<?php include("middle.php"); ?>

<?php
    $sql = "SELECT MAX(lf08v2_modelle.tagesmietpreis) AS hoechster_tagesmietpreis, lf08v2_modelle.bezeichnung FROM lf08v2_modelle JOIN lf08v2_fahrradarten WHERE lf08v2_fahrradarten.bezeichnung = 'Kinderrad';";
    $ausgabe = $connection->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>Modellname</th>
            <th>Höchster Tagesmietpreis (Kinderrad)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo $inhalt['bezeichnung']; ?></td>
                <td><?php echo $inhalt['hoechster_tagesmietpreis'] . "€"; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>