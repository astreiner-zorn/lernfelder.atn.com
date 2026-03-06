<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf10a/php/includes/database-connect.php");

    $sql = "SELECT * FROM buch WHERE buchID";
    $stmt = $connection->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
        <tr>
            <td><?php echo $row['buchID']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>