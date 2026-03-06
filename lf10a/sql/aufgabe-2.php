<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf10a/php/includes/database-connect.php");

    $sql = "SELECT buchID, ISBN, titel FROM buch WHERE titel = 'Es';";
    $stmt = $connection->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h3>Frage</h3>
<h2>Wie finde ich das Buch mit dem Titel "Es"?</h2>
<div><pre><code class="languaqe-sql">SELECT buchID, ISBN, titel FROM buch WHERE titel = 'Es';</code></pre></div>

<h3>Ergebnis</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ISBN</th>
            <th>Titel</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $row['buchID']; ?></td>
            <td><?php echo $row['ISBN']; ?></td>
            <td><?php echo $row['titel']; ?></td>
        </tr>
    </tbody>
</table>