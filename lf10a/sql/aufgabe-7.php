<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf10a/php/includes/database-connect.php");

    $sql = "
        SELECT COUNT(*) AS buch_anzahl
        FROM autor
        JOIN buchautor 
            ON autor.autorid = buchautor.autorID
        JOIN buch
            ON buchautor.buchID = buch.buchID
        WHERE autor.nachname = 'Pratchett'
    ";
    
    $stmt = $connection->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    foreach ($rows AS $row) {
        echo "Anzahl der Bücher: " . $row['buch_anzahl'];
    }
?>