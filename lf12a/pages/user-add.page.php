<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/includes/database.php");
?>

<?php if (isset($benutzer)): ?>
    <?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/forms/user-add.form.php"); ?>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])): ?> 
        <?php
            $username = htmlspecialchars(trim($_POST['username']));
            $password = $_POST['password']; 

            $sql = "SELECT * FROM lf12a_user WHERE username = :username";
            $statement = $pdo->prepare($sql);
            $statement->execute([':username' => $username]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                echo "<p class='text-danger'>Benutzername existiert bereits.</p>";
            } else {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO lf12a_user (username, password) VALUES (:username, :password)";
                $statement = $pdo->prepare($sql);
                $statement->execute([
                    ':username' => $username,
                    ':password' => $password_hash
                ]);

                header("Location: index.php?page=users");
            }
        ?>
    <?php endif; ?>
<?php endif; ?>