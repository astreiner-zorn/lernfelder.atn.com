<?php
    $pageTitle = "Login-Seite";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/includes/middle.php");
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/lfvt4v2/forms/login.form.php");
?>


<?php if (isset($_POST['benutzername']) && isset($_POST['passwort'])): ?> 
    <?php
        $benutzername = htmlspecialchars($_POST['benutzername']);
        $passwort = $_POST['passwort']; 
    ?>

    <?php
        $sql = "SELECT * FROM lfvt4v2_login WHERE benutzername = :benutzername";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':benutzername', $benutzername, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && $user['passwort'] === $passwort) {
             // Login erfolgreich → Benutzer in Session speichern
            $_SESSION['user'] = [
                'id' => $user['id'],
                'benutzername' => $user['benutzername']
            ];

            header("Location: /lfvt4v2/index.php"); //
            exit;
        } else {
            echo "Benutzername oder Passwort falsch.";
        }
    ?>
<?php endif; ?>

