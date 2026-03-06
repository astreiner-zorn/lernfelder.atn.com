<div class="header-picture">
    <img src="images/php.png" alt="PHP">
</div>

<div class="content-content">
    <div class="code-section">
        <form method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
    
            <label for="email">E-Mail Adresse</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Absenden</button>
            <button type="reset">Zurücksetzen</button>
        </form>

        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['email'])) {
            
            // Daten aus dem Formular holen und gegen XSS absichern
            $name = htmlspecialchars($_POST['name']);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

            // Objekt der Klasse Person erstellen
            $person = new Person($name, $email);

            // Ausgabe der Vorstellung
            echo $person->vorstellen();
        }
        ?>

        <?php
            class Person {
                private $name;
                private $email;

                function checkEMail($email) {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $this->email=$email;
                        return true;
                    } else {
                        return false; //Mail-Adresse konnte nicht gespeichert werden
                    }
                }

                public function __construct($name, $email) {
                    $this->name = $name;
                    $this->checkEMail($email);
                }

                public function vorstellen() {
                    return "Hallo, ich heiße {$this->name} und meine E-Mail Adresse ist {$this->email}";
                }
            }
        ?>
    </div>
</div>