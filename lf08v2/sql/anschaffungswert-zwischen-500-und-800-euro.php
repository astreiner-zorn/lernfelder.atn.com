<?php $bereich = 'SQL-Bereich'; $pageTitle = 'Startseite der SQL-Instanz'; require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/sql.header.php"); ?>

SELECT * FROM lf08v2_fahrraeder WHERE anschaffungswert > 500 AND anschaffungswert < 800;

<?php include("middle.php"); ?>

<?php
    $sql = "SELECT * FROM lf08v2_fahrraeder WHERE anschaffungswert > 500 AND anschaffungswert < 800;";
    $ausgabe = $connection->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>Anschaffungswert zwischen 500€ und 800€</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ausgabe as $inhalt): ?>
            <tr>
               <td><?php echo $inhalt['anschaffungswert'] . "€"; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf08v2/includes/footer.php"); ?>