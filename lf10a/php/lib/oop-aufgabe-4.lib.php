<div class="header-picture">
    <img src="images/php.png" alt="PHP">
</div>

<div class="content-content">
    <?php
        // Mitarbeiter-Daten als Array
        $mitarbeiter = [
            [
                "Name" => "Max Biedermann",
                "Alter" => 45,
                "Position" => "Rektor",
                "Jahresgehalt" => 60000
            ],
            [
                "Name" => "Susi Grün",
                "Alter" => 30,
                "Position" => "Lehrer",
                "Jahresgehalt" => 30000
            ]
        ];

        // Array für die Objekte der Klasse Mitarbeiter
        $mitarbeiterListe = [];
        foreach ($mitarbeiter as $details) {
            $name = $details["Name"];
            $alter = $details["Alter"];
            $position = $details['Position'];
            $jahresgehalt = $details['Jahresgehalt'];
                
            $mitarbeiterListe[] = new Mitarbeiter($name, $alter, $position, $jahresgehalt);
        }

        // Mitarbeiter-Klasse
        class Mitarbeiter {
            private $name;
            private $alter;
            private $position;
            private $jahresgehalt;

            public function __construct($name, $alter, $position, $jahresgehalt) {
                $this->name = $name;
                $this->alter = $alter;
                $this->position = $position;
                $this->jahresgehalt = $jahresgehalt;
            }

            public function getDetails() {
                return [
                    "Name" => $this->name,
                    "Alter" => $this->alter,
                    "Position" => $this->position,
                    "Jahresgehalt" => $this->jahresgehalt
                ];
            }
        }

        // Alle Mitarbeiter-Daten aus den Objekten extrahieren
        $daten = [];
        foreach ($mitarbeiterListe as $objekt) {
            $daten[] = $objekt->getDetails();
        }
    ?>

    <table class="code-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Alter</th>
                <th>Position</th>
                <th>Jahresgehalt</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daten as $person): ?>
                <tr>
                    <td><?php echo htmlspecialchars($person["Name"]); ?></td>
                    <td><?php echo htmlspecialchars($person["Alter"]); ?></td>
                    <td><?php echo htmlspecialchars($person["Position"]); ?></td>
                    <td><?php echo htmlspecialchars(number_format($person["Jahresgehalt"], 2, ',', '.')); ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
