<div class="header-picture">
    <img src="images/mysql.png" alt="MySQL">
</div>

<div class="content-content">
    <?php
        $sql = "SELECT * FROM lf10a_buch WHERE buchID";
        $result = $connection->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $result->fetchAll();
    ?>

    <table class="code-table">
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
</div>