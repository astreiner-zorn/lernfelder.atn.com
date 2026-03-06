# -----------------------------------------------------------------------------------------------------------
# Datenbankprogrammierung mit SQLite 3
# -----------------------------------------------------------------------------------------------------------

# Import des Moduls "sqlite3"
import sqlite3

# Verbindung zur SQLite3-Datenbank herstellen
conn = sqlite3.connect('testdatenbank.db')

# Cursor-Objekt erstellen
c = conn.cursor()

# Tabelle "Kunden" erstellen
c.execute('''
    CREATE TABLE IF NOT EXISTS Kunden (
        kundenid INTEGER PRIMARY KEY AUTOINCREMENT,
        vorname VARCHAR(50),
        nachname VARCHAR(50),
        strasse VARCHAR(100),
        plz INTEGER,
        stadt TEXT,
        bemerkungen VARCHAR(250)
    )
''')

# Tabelle "Kunden" mit Daten füllen
c.execute("INSERT INTO Kunden (vorname, nachname, strasse, plz, stadt, bemerkungen) VALUES ('Max', 'Mustermann', 'Musterstraße', 12345, 'Musterstadt', 'Bemerkung')")

# Tabelle "Artikel" erstellen
c.execute('''
    CREATE TABLE IF NOT EXISTS Artikel (
        artikelid INTEGER PRIMARY KEY AUTOINCREMENT,
        artikelname VARCHAR(50),
        ekpreis FLOAT,
        vkpreis FLOAT,
        verfuegbarkeit INTEGER,
        verkauft INTEGER
    )
''')

# Tabelle "Artikel" mit Daten füllen
c.execute("INSERT INTO Artikel (artikelname, ekpreis, vkpreis, verfuegbarkeit, verkauft) VALUES ('Musterartikel', 10.00, 25.00, 120, 29)")

# Tabelle "Lieferanten" erstellen
c.execute('''
    CREATE TABLE IF NOT EXISTS Lieferanten (
        lieferantenid INTEGER PRIMARY KEY AUTOINCREMENT,
        lieferantenname VARCHAR(50)
    )
''')

# Tabelle "Lieferanten" mit Daten füllen
c.execute("INSERT INTO Lieferanten (lieferantenname) VALUES ('Musterlieferant')")

# Speicherung der Änderungen
conn.commit()

# Verbindung zur Datenbank schließen
conn.close()