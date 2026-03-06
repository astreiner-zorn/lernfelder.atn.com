<div class="header-picture">
    <img src="images/mysql.png" alt="MySQL">
</div>

<div class="content-content">
    <?php
        $sql = "
            SELECT COUNT(*) AS buch_anzahl
            FROM lf10a_autor
            JOIN lf10a_buchautor 
                ON lf10a_autor.autorid = lf10a_buchautor.autorID
            JOIN lf10a_buch
                ON lf10a_buchautor.buchID = lf10a_buch.buchID
            WHERE lf10a_autor.nachname = 'Pratchett'
        ";
        $result = $connection->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $result->fetchAll();
    ?>
    
    <?php
    foreach ($rows AS $row) {
        echo "Anzahl der Bücher: " . $row['buch_anzahl'];
    }
    ?>
</div>