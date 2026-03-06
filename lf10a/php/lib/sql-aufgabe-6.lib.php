<div class="header-picture">
    <img src="images/mysql.png" alt="MySQL">
</div>

<div class="content-content">
    <?php
        $sql = "
            SELECT lf10a_buch.buchID, lf10a_buch.ISBN, lf10a_buch.titel
            FROM lf10a_autor
            JOIN lf10a_buchautor 
                ON lf10a_autor.autorid = lf10a_buchautor.autorID
            JOIN lf10a_buch
                ON lf10a_buchautor.buchID = lf10a_buch.buchID
            WHERE lf10a_autor.nachname = 'King'
        ";
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