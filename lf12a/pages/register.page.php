<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/database.php");
?>

<?php if (empty($_SESSION['user'])): ?>
    <?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/lf12a/forms/register.form.php"); ?>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'], $_POST['password_wdh'])): ?> 
        <?php
            $username = htmlspecialchars(trim($_POST['username']));
            $password = $_POST['password']; 
            $password_wdh = $_POST['password_wdh']; 

            $sql = "SELECT * FROM lf12a_user WHERE username = :username";
            $statement = $pdo->prepare($sql);
            $statement->execute([':username' => $username]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                echo "<p class='text-danger'>Benutzername existiert bereits.</p>";
            } elseif ($password !== $password_wdh) {
                echo "<p class='text-danger'>Passwörter stimmen nicht überein.</p>";
            } else {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO lf12a_user (username, password) VALUES (:username, :password)";
                $statement = $pdo->prepare($sql);
                $statement->execute([
                    ':username' => $username,
                    ':password' => $password_hash
                ]);

                echo "<p class='mt-20 text-success'>Registrierung erfolgreich! Du kannst dich jetzt <a href='index.php?page=login'>einloggen</a>.</p>";
            }
        ?>
    <?php endif; ?>
<?php else: ?>
    <h3 class="text-danger">Registrierung nicht möglich</h3>
    <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
        <p>Hallo <?= htmlspecialchars($_SESSION['user']['username'] ?? ''); ?>! 
           Du bist bereits eingeloggt. Bitte <a class="text-decoration-none" href="index.php?page=logout">melde dich zu erst ab</a>, um dich neu zu registrieren.</p>
    </div>
<?php endif; ?>