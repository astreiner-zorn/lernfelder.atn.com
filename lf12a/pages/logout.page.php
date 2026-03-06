<?php
session_unset(); // Alle Session-Variablen löschen
session_destroy(); // Session beenden
header("Location: /lf12a/index.php"); //
exit;
