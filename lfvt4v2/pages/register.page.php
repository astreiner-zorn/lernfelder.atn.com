<?php
$pageTitle = "Registrierung";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/includes/middle.php");
?>

<?php if (!isset($benutzer)): ?>
    <?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/forms/register.form.php"); ?>
    <?php if (isset($_POST['benutzername'], $_POST['passwort'], $_POST['passwort_wdh'])): ?> 
        <?php
            $benutzername = htmlspecialchars(trim($_POST['benutzername']));
            $passwort = $_POST['passwort']; 
            $passwort_wdh = $_POST['passwort_wdh']; 

            $sql = "SELECT * FROM lfvt4v2_login WHERE benutzername = :benutzername";
            $statement = $connection->prepare($sql);
            $statement->execute([':benutzername' => $benutzername]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                echo "<p class='text-danger'>Benutzername existiert bereits.</p>";
            } elseif ($passwort !== $passwort_wdh) {
                echo "<p class='text-danger'>Passwörter stimmen nicht überein.</p>";
            } else {
                // Passwort hashen
                $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

                // Benutzer einfügen
                $sql = "INSERT INTO lfvt4v2_login (benutzername, passwort) VALUES (:benutzername, :passwort)";
                $statement = $connection->prepare($sql);
                $statement->execute([
                    ':benutzername' => $benutzername,
                    ':passwort' => $passwort_hash
                ]);

                echo "<h4 class='text-success'>Registrierung erfolgreich! Du kannst dich jetzt <a href='index.php?page=login'>einloggen</a>.</h4>";
            }
        ?>
    <?php endif; ?>
<?php else: ?>
    <h3 class="text-danger">Registrierung nicht möglich</h3>
    <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
        <p>Hallo <?= $_SESSION['user']['benutzername']; ?>! Du bist bereits eingeloggt. Bitte <a class="text-decoration-none" href="index.php?page=logout">melde dich zu erst ab</a>, um dich neu zu registrieren.</p>
    </div>
<?php endif; ?>