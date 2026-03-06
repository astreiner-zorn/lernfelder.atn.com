# Klasse Musik-Store mit der main()- Methode
from Gitarre import Gitarre

def main():
    # Instanziierung
    instrument = Gitarre('Stratocaster', 'Fender', 5000.0, 'medium')

    # Methoden der Klasse nutzen
    instrument.setPreis(3998.0)

    print(instrument.getHersteller())
    print(instrument.getModell())
    print(instrument.getPreis())

    # Attribut der abgeleiteten Klasse
    print(instrument.getGrösse())

    print("Alle Daten aus Musikinstrument:", instrument.getDaten())

# Aufruf der main()-Methode
if __name__ == "__main__":
    main()