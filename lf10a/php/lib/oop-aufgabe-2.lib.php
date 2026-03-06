<div class="header-picture">
    <img src="images/php.png" alt="PHP">
</div>

<div class="content-content">
    <div class="code-section">
    <?php
        $verzeichnis = [
            [
                "Name" => "Alfred A.",
                "Alter" => 23,
                "Hauptfach" => "Ameisenkunde",
            ],
            [
                "Name" => "Susi S.",
                "Alter" => 22,
                "Hauptfach" => "Englisch"
            ]
        ];

        foreach ($verzeichnis as $studentDetails) {
            $name = $studentDetails["Name"];
            $alter = $studentDetails["Alter"];
            $hauptfach = $studentDetails["Hauptfach"];

            $student[] = new Student($name, $alter, $hauptfach);
        }

        class Student {
            public $name;
            public $alter;
            public $hauptfach;

            public function __construct($name, $alter, $hauptfach) {
                $this->name = $name;
                $this->alter = $alter;
                $this->hauptfach = $hauptfach;
            }

            public function hatGeburtstag() {
                $this->alter++;
                return "{$this->name} hat heute Geburtstag und wird {$this->alter} Jahre alt.";
            }

            public function wechseltHauptfach($neuesHauptfach) {
                $altesHauptfach = $this->hauptfach;
                $this->hauptfach = $neuesHauptfach;
                return "{$this->name} hat das Hauptfach von {$altesHauptfach} auf {$this->hauptfach} gewechselt.";
            }
        }
        ?>

        <p><?php echo $student[0]->hatGeburtstag(); ?></p>

        <?php $neuesHauptfach = "Latein"; ?>
        <p><?php echo $student[1]->wechseltHauptfach($neuesHauptfach); ?></p>

    </div>
</div>