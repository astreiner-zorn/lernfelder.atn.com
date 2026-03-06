<div class="header-picture">
    <img src="images/mysql.png" alt="MySQL">
</div>

<?php
    $sql = "SELECT * FROM lf10a_autorensuche";
    $result = $connection->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $result->fetchAll();
?>

<div class="content-content">
    <h2 class="sectionHeader">Übersicht</h2>
    <div class="section">
        <div class="row autorensuche-row">
            <?php foreach ($rows as $row): ?>
                <div class="col-md-4">
                    <div class="global-card">
                        <div class="global-card-image">
                            <img src="images/autorensuche/<?php echo $row['cover']; ?>" alt="<?php echo htmlspecialchars($row['titel']); ?>">
                        </div>
                        <div class="global-card-header">
                            <h4><?php echo htmlspecialchars($row['beschreibung']); ?></h4>
                        </div>
                        <div class="global-card-description">
                            <dl>
                                <dt>Interne ID:</dt> <dd><?php echo htmlspecialchars($row['buchID']); ?></dd>
                                <dt>Buchtitel:</dt> <dd><?php echo htmlspecialchars($row['titel']); ?></dd>
                                <dt>ISBN:</dt> <dd><?php echo htmlspecialchars($row['ISBN']); ?></dd>
                            </dl>
                        </div>
                    </div>   
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h2 class="sectionHeader">Suche</h2>
            <div class="section">
                <form method="POST" action="">
                    <input type="text" id="search" name="search" placeholder="Suche nach Buchtitel oder ISBN">
                    <input type="text" class="invisible">
                    <input type="text" class="invisible">
                    <input type="text" class="invisible">
                    <button type="submit">Suche starten</button>
                </form>
    
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $search = $_POST['search'] ?? '';
                        if (!empty($search)) {
                            // SQL-Abfrage vorbereiten (mit LIKE für unscharfe Suche)
                            $sql = "SELECT * FROM buch WHERE titel LIKE :search OR ISBN LIKE :search";
                            $stmt = $connection->prepare($sql);
                            $stmt->execute(['search' => "%$search%"]);
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        } else {
                            $rows = [];
                        }
                    }
                ?>
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="sectionHeader">Neues Buch eintragen</h2>
            <div class="section">
                <form method="POST" action="">
                    <input type="text" id="name" name="name" placeholder="Name des Buches">
                    <input type="text" id="isbn" name="isbn" placeholder="ISBN des Buches">
                    <input type="text" id="beschreibung" name="beschreibung" placeholder="Beschreibung des Buches">
                    <input type="text" id="bild" name="bild" placeholder="Dateiname des Bildes">
                    <button type="submit">Buch eintragen</button>
                </form>
            </div>
        </div>
    </div>
</div>