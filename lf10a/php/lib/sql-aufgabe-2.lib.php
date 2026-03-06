<div class="header-picture">
    <img src="images/mysql.png" alt="MySQL">
</div>

<div class="content-content">
    <?php
        $sql = "SELECT * FROM lf10a_autor WHERE autorid = 3";
        $result = $connection->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $result->fetchAll();
    ?>

    <table class="code-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo $row['autorid']; ?></td>
                <td><?php echo $row['vorname']; ?></td>
                <td><?php echo $row['nachname']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>