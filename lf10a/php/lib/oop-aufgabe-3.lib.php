<div class="header-picture">
    <img src="images/php.png" alt="PHP">
</div>

<?php

$name = "Sven Berger";
$alter = 33;
$gehalt = 1200;
$position = "Ausbildung";

$person = new Person($name, $alter);

class Person {
    protected $name;
    protected $alter;

    public function __construct($name, $alter) {
        $this->name = $name;
        $this->alter = $alter;
    }

    public function vorstellen() {
        return "Hallo, mein Name ist {$this->name} und ich bin {$this->alter} Jahre alt.";
    }
}

?>

<?php

class Mitarbeiter extends Person {
    private $gehalt;
    private $position;

    public function __construct ($name, $alter, $gehalt, $position) {
        parent::__construct($name, $alter);
        $this->gehalt = $gehalt;
        $this->position = $position;
    }

    public function vorstellen() {
        return
        [
            "Name" => "{$this->name}",
            "Alter" => "{$this->alter}",
            "Gehalt" => "{$this->gehalt}",
            "Position" => "{$this->position}"
        ];
    }
}

$mitarbeiter = new Mitarbeiter($name, $alter, $gehalt, $position);
$mitarbeiterDaten = $mitarbeiter->vorstellen();

?>

<div class="content-content">
    <div class="code-section">
        <?php echo $person->vorstellen(); ?>
    </div>
</div>

<div class="content-content">
    <table class="code-table">
        <thead>
            <tr>
                <th>Eigenschaft</th>
                <th>Attribut</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mitarbeiterDaten AS $key => $value): ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $value; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>