<div class="header-picture">
    <img src="images/mysql.png" alt="MySQL">
</div>

<div class="content-content">
    <?php
        $sql = "SELECT * FROM lf10a_buch WHERE titel = 'Es'";
        $result = $connection->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $result->fetchAll();
    ?>

    <table class="code-table">
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
</div>