<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT MAX(anschaffungswert) AS 'Kleinster Anschaffungswert' FROM lf08v2_fahrraeder;

<?php include("middle.php"); ?>

<?php
    $sql = "SELECT MIN(anschaffungswert) AS 'min_anschaffungswert' FROM lf08v2_fahrraeder;";
    $ausgabe = $connection->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>Kleinster Anschaffungswert</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
                <td><?php echo $inhalt['min_anschaffungswert'] . "€"; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>