import tkinter as tk
from tkinter import messagebox

## Definition der Klasse Gebaeude
class Gebaeude:
    # Initialisierungsmethode mit Adresse, Preis und Baujahr als Parameter
    def __init__(self, adresse, preis, baujahr):
        self.adresse = adresse
        self.preis = preis
        self.baujahr = baujahr
        # a) Zusätzliche Eigenschaft
        self.zusatz_eigenschaft = None

    # Methode zur Rückgabe der Daten des Gebäudes
    def get_daten(self):
        return f'Adresse: {self.adresse}, Preis: {self.preis}, Baujahr: {self.baujahr}'

# Definition der Klasse Wohnhaus, die von Gebaeude erbt
class Wohnhaus(Gebaeude):
    # Initialisierungsmethode mit Adresse, Preis, Baujahr und Anzahl der Wohnungen als Parameter
    def __init__(self, adresse, preis, baujahr, anzahlWohnungen):
        super().__init__(adresse, preis, baujahr)
        self.anzahlWohnungen = anzahlWohnungen
        # a) Zusätzliche Eigenschaft
        self.zusatz_eigenschaft_wh = None

    # b) Überschreiben der Methode get_daten
    def get_daten(self):
        return f'{super().get_daten()}, Anzahl Wohnungen: {self.anzahlWohnungen}'

# Definition der Klasse Lagerhalle, die von Gebaeude erbt
class Lagerhalle(Gebaeude):
    # Initialisierungsmethode mit Adresse, Preis, Baujahr und Lagerfläche als Parameter
    def __init__(self, adresse, preis, baujahr, lagerFlaeche):
        super().__init__(adresse, preis, baujahr)
        self.lagerFlaeche = lagerFlaeche
        # a) Zusätzliche Eigenschaft
        self.zusatz_eigenschaft_lh = None

    # b) Überschreiben der Methode get_daten
    def get_daten(self):
        return f'{super().get_daten()}, Lagerfläche: {self.lagerFlaeche}'

# d) Weitere Klasse Buero, die von Gebaeude erbt
class Buero(Gebaeude):
    # Initialisierungsmethode mit Adresse, Preis, Baujahr, Bürofläche und Anzahl der Büros als Parameter
    def __init__(self, adresse, preis, baujahr, bueroFlaeche, anzahlBueros):
        super().__init__(adresse, preis, baujahr)
        self.bueroFlaeche = bueroFlaeche
        self.anzahlBueros = anzahlBueros

    # Methode zur Rückgabe der Daten des Büros
    def get_daten(self):
        return f'{super().get_daten()}, Bürofläche: {self.bueroFlaeche}, Anzahl Büros: {self.anzahlBueros}'

# GUI-Klasse
class App:

    def __init__(self, root):

        self.root = root
        self.root.title('Gebäude Manager')

        # Eingabefelder und Labels
        self.adresse_label = tk.Label(root, text='Adresse:')
        self.adresse_label.grid(row=0, column=0)
        self.adresse_entry = tk.Entry(root)
        self.adresse_entry.grid(row=0, column=1)

        self.preis_label = tk.Label(root, text='Preis:')
        self.preis_label.grid(row=1, column=0)
        self.preis_entry = tk.Entry(root)
        self.preis_entry.grid(row=1, column=1)

        self.baujahr_label = tk.Label(root, text='Baujahr:')
        self.baujahr_label.grid(row=2, column=0)
        self.baujahr_entry = tk.Entry(root)
        self.baujahr_entry.grid(row=2, column=1)

        # Zusätzliche Eingabefelder
        self.wohnungsanzahl_label = tk.Label(root, text='Anzahl Wohnungen:')
        self.wohnungsanzahl_label.grid(row=3, column=0)
        self.wohnungsanzahl_entry = tk.Entry(root)
        self.wohnungsanzahl_entry.grid(row=3, column=1)

        self.lagerflaeche_label = tk.Label(root, text='Lagerfläche:')
        self.lagerflaeche_label.grid(row=4, column=0)
        self.lagerflaeche_entry = tk.Entry(root)
        self.lagerflaeche_entry.grid(row=4, column=1)

        self.bueroflaeche_label = tk.Label(root, text='Bürofläche:')
        self.bueroflaeche_label.grid(row=5, column=0)
        self.bueroflaeche_entry = tk.Entry(root)
        self.bueroflaeche_entry.grid(row=5, column=1)

        self.bueroanzahl_label = tk.Label(root, text='Anzahl Büros:')
        self.bueroanzahl_label.grid(row=6, column=0)
        self.bueroanzahl_entry = tk.Entry(root)
        self.bueroanzahl_entry.grid(row=6, column=1)

        # Buttons
        self.wohnhaus_button = tk.Button(root, text='Erstelle Wohnhaus', command=self.create_wohnhaus)
        self.wohnhaus_button.grid(row=7, column=0, pady=10)

        self.lagerhalle_button = tk.Button(root, text='Erstelle Lagerhalle', command=self.create_lagerhalle)
        self.lagerhalle_button.grid(row=7, column=1, pady=10)

        self.buero_button = tk.Button(root, text='Erstelle Büro', command=self.create_buero)
        self.buero_button.grid(row=7, column=2, pady=10)

    def create_wohnhaus(self):
        try:
            wohnhaus = Wohnhaus(self.adresse_entry.get(), float(self.preis_entry.get()), int(self.baujahr_entry.get()), int(self.wohnungsanzahl_entry.get()))
            messagebox.showinfo('Wohnhaus erstellt', wohnhaus.get_daten())
        except ValueError:
            messagebox.showerror("Fehler", "Bitte geben Sie gültige Werte ein.")

    def create_lagerhalle(self):
        try:
            lagerhalle = Lagerhalle(self.adresse_entry.get(), float(self.preis_entry.get()), int(self.baujahr_entry.get()), float(self.lagerflaeche_entry.get()))
            messagebox.showinfo('Lagerhalle erstellt', lagerhalle.get_daten())
        except ValueError:
            messagebox.showerror("Fehler", "Bitte geben Sie gültige Werte ein.")

    def create_buero(self):
        try:
            buero = Buero(self.adresse_entry.get(), float(self.preis_entry.get()), int(self.baujahr_entry.get()), float(self.bueroflaeche_entry.get()), int(self.bueroanzahl_entry.get()))
            messagebox.showinfo('Bürogebäude erstellt', buero.get_daten())
        except ValueError:
            messagebox.showerror("Fehler", "Bitte geben Sie gültige Werte ein.")

# Hauptprogramm
root = tk.Tk()
app = App(root)
root.mainloop()