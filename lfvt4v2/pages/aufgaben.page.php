<?php

// Aufgabe 3: Entwickler suchen, die den Buchstaben "o" im Namen haben (LIKE)
$sql = "SELECT * FROM entwickler WHERE name LIKE '%o'";

// Aufgabe 4: Komponenten alphabetisch sortieren (ORDER BY)
$sql = "SELECT * FROM komponenten ORDER BY name ASC";

// Aufgabe 5: Die zwei ersten Komponenten anzeigen (LIMIT)
$sql = "SELECT * FROM komponenten LIMIT 2";