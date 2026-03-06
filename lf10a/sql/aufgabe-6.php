<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf10a/php/includes/database-connect.php");

    $sql = "
        SELECT buch.buchID, buch.ISBN, buch.titel
        FROM autor
        JOIN buchautor 
            ON autor.autorid = buchautor.autorID
        JOIN buch
            ON buchautor.buchID = buch.buchID
        WHERE autor.nachname = 'King'
    ";

    $stmt = $connection->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ISBN</th>
            <th>Titel</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
        <tr>
            <td><?php echo $row['buchID']; ?></td>
            <td><?php echo $row['ISBN']; ?></td>
            <td><?php echo $row['titel']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>