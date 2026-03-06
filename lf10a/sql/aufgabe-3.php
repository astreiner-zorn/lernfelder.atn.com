<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf10a/php/includes/database-connect.php");

    $sql = "SELECT buchID, ISBN, titel FROM buch ORDER BY buchID;";
    $stmt = $connection->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h3>Frage</h3>
<h2>Welche buchIDs gibt es in der Datenbank?</h2>
<div class="answer"><pre><code class="languaqe-sql">SELECT buchID, ISBN, titel FROM buch ORDER BY buchID;</code></pre></div>

<h3 class="ausgabe">Ergebnis</h3>
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