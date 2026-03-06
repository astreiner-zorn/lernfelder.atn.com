anfangswert = int(input("Bitte gib den Anfangswert an: "))
endwert = int(input("Bitte gib den Endwert an: "))
schrittweise = int(input("Bitte gib den Stellenwert an: "))

def ausgabe(anfangswert, endwert, schrittweite):
    for x in range(anfangswert, endwert, schrittweite):
        print(x)
    print("Schleife erfolgreich abgeschlossen.")

ausgabe(anfangswert, endwert, schrittweise)