<div class="header-picture">
    <img src="images/php.png" alt="PHP">
</div>

<div class="content-content">
    <div class="code-section">
        <form method="POST" action="">
            <label for="name">Name</label>
            <select name="name" id="name">
                <option value="Alfred A.">Alfred A.</option>
                <option value="Susi S.">Susi S.</option>
            </select>

            <label for="alter">Alter</label>
            <input type="number" id="alter" name="alter" required>

            <label for="hauptfach">Hauptfach</label>
            <input type="text" id="hauptfach" name="hauptfach" required>

            <div id="neuesHauptfachContainer" style="display: none";>
                <label for="neuesHauptfach">Neues Hauptfach</label>
                <input type="text" id="neuesHauptfach" name="neuesHauptfach">
            </div>
            <button type="submit" name="submit">Absenden</button>
            <button type="reset">Zurücksetzen</button>
        </form>

        <script>
            function neuesHauptfach() {
                document.getElementById("name").addEventListener("change", function(e) {
                    const name = document.getElementById('name');

                    if (name.value === "Susi S.") {
                        neuesHauptfachContainer.style.display = "grid"; // Einblenden
                    } else {
                        neuesHauptfachContainer.style.display = "none"; // Ausblenden
                    }
                });
            }
            neuesHauptfach();
        </script>

        <?php if (isset($_POST['submit'])): ?>
            <?php
                $name = htmlspecialchars($_POST['name']  ?? '');
                $alter = (int)$_POST['alter'];
                $hauptfach = htmlspecialchars($_POST['hauptfach']  ?? '');
                $neuesHauptfach = htmlspecialchars($_POST['neuesHauptfach'] ?? '');

                if ($name === "Alfred A.") {
                    $neuesHauptfach = "Nicht angegeben";
                }

                $student = new Student($name, $alter, $hauptfach, $neuesHauptfach);

                if ($name === "Alfred A.") {
                    echo $student->hatGeburtstag();
                } elseif ($name === "Susi S.") {
                    echo $student->wechseltHauptfach();
                }
            ?>
        <?php endif; ?>

        <?php
            class Student {
                public $name;
                public $alter;
                public $hauptfach;
                public $neuesHauptfach;

                public function __construct($name, $alter, $hauptfach, $neuesHauptfach) {
                    $this->name = $name;
                    $this->alter = $alter;
                    $this->hauptfach = $hauptfach;
                    $this->neuesHauptfach = $neuesHauptfach;
                }

                public function hatGeburtstag() {
                    $this->alter++;
                    return "{$this->name} hat heute Geburtstag. Er wird {$this->alter} Jahre alt.";
                }

                public function wechseltHauptfach() {
                    $altesHauptfach = $this->hauptfach;
                    return "{$this->name} hat ihr altes Studienfach {$altesHauptfach} zu {$this->neuesHauptfach} gewechselt.";
                }
            }
        ?>
    </div>
</div>

<style>
    #neuesHauptfachContainer {
    transition: all 0.3s ease;
}
</style>