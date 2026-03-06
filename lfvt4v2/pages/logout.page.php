<?php
    session_unset(); // Alle Session-Variablen löschen
    session_destroy(); // Session beenden
    header("Location: /lfvt4v2/index.php"); //
    exit;
?>