# Benötigte Bibiothek importieren
import tkinter as tk

# Funktion für die Berechnung aufgeführt
def berechne():
    try:
        # Eingabe der Zahlen mit der entsprechenden Operation
        zahl1 = float(eingabe1.get())
        zahl2 = float(eingabe2.get())
        operation = rechenoperation.get()

        # Addition
        if operation == "+":
            ergebnis = zahl1 + zahl2
        # Subtraktion
        elif operation == "-":
            ergebnis = zahl1 - zahl2
        # Multiplikation
        elif operation == "*":
            ergebnis = zahl1 * zahl2
        # Division 
        elif operation == "/":
            if zahl2 == 0:
                ergebnis = "Division durch 0 ist nicht möglich!"
            else:
                ergebnis = zahl1 / zahl2
        else:
            ergebnis = "Deine Rechenoperation ist so nicht akzeptiert!"

        ergebnis_ergebnis.config(text="Das Ergebnis lautet: " + str(ergebnis))
    
    except ValueError:
        ergebnis_ergebnis.config(text="Eingabe nicht akzeptiert!")


# Erstellen des Hauptfensters
fenster = tk.Tk()
fenster.title = ("Taschenrechner")

# Erstellen der Eingabefelder
## Eingabefeld 1
eingabe1 = tk.Entry(fenster)
eingabe1.grid(row=0, column=0, padx=5, pady = 5)
## Eingabefeld 2
eingabe2 = tk.Entry(fenster)
eingabe2.grid(row=0, column=2, padx=5, pady = 5)

#Erstellung der Auswahl der Rechenoperation
rechenoperation = tk.StringVar(fenster)
rechenoperation.set("+") # Addition ist nun der Standardwert

optionen = ["+", "-", "*", "/"]
rechenoperation_menu = tk.OptionMenu(fenster, rechenoperation, *optionen)
rechenoperation_menu.grid(row=0, column=1, padx=5, pady=5)

# Erstellung der Buttons für die Berechnung
berechnen_button = tk.Button (fenster, text="Berechnen", command=berechne)
berechnen_button.grid(row=1, column=1, padx=5, pady=5)

# Erstellung des Labels für die Ausgabe des Ergebnisses
ergebnis_ergebnis = tk.Label(fenster, text="Ergebnis")
ergebnis_ergebnis.grid(row=2, column=0, columnspan=3, padx=5, pady=5)

# Start der GUI
fenster.mainloop()