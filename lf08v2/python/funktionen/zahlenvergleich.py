zahl1 = int(input("Bitte gib die erste Zahl an: "))
zahl2 = int(input("Bitte gib die Zahl an, mit der du Zahl1 vergleichen möchtest: "))

def zahlen_vergleichen(zahl1, zahl2):
    if zahl1 == zahl2:
        return "gleich"
    elif zahl1 < zahl2:
        return "kleiner"
    else:
        return "größer"
    
ergebnis = zahlen_vergleichen(zahl1, zahl2)
print("Der Vergleich ergibt:", zahl1, "ist", ergebnis, "als", zahl2)