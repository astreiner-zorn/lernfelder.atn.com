<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/lf12a/forms/login.form.php");
?>

<?php if (isset($_POST['username']) && isset($_POST['password'])): ?> 
    <?php
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    ?>

    <?php
    $sql = "SELECT * FROM lf12a_user WHERE username = :username";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Login erfolgreich → Benutzer in Session speichern
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user']    = $user['username'];

        header("Location: index.php"); //
        exit;
    } else {
        echo "Benutzername oder Passwort falsch.";
    }
    ?>
<?php endif; ?>