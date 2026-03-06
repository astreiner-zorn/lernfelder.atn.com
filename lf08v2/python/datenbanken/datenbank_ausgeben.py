# Import des Moduls "sqlite3"
import sqlite3

# Daten aus den Tabellen abrufen
conn = sqlite3.connect('testdatenbank.db')
c = conn.cursor()

# Alle Kunden anzeigen
c.execute("SELECT * FROM Kunden")
print("Kunden:")
for row in c.fetchall():
    print(row)

# Alle Artikel anzeigen
c.execute("SELECT * FROM Artikel")
print("\nArtikel:")
for row in c.fetchall():
    print(row)

# Alle Lieferanten anzeigen
c.execute("SELECT * FROM Lieferanten")
print("\nLieferanten:")
for row in c.fetchall():
    print(row)

conn.close()
