<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf10a/php/includes/database-connect.php");
    
    $sql = "Select * FROM autor WHERE autorid = 3;";
    $stmt = $connection->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h3>Frage</h3>
<h2>Wie muss der SQL-Befehl lauten, um den Autor mit der ID 3 auszulesen?</h2>
<div><pre><code class="language-sql">SELECT * FROM autor WHERE autorid = 3;</code></pre></div>

<h3>Ergebnis</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Vorname</th>
            <th>Nachname</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $row['autorid']; ?></td>
            <td><?php echo $row['vorname']; ?></td>
            <td><?php echo $row['nachname']; ?></td>
        </tr>
    </tbody>
</table>