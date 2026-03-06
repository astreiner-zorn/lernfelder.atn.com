import tkinter as tk
from tkinter import messagebox
import random

class Kniffel:
    def __init__(self):
        self.fenster = tk.Tk()
        self.fenster.title("Kniffel")

        self.würfe = 0
        self.ergebnisse = []
        self.gehaltene_würfel = [False] * 5
        self.punkte = {
            "Einser": None, "Zweier": None, "Dreier": None,
            "Vierer": None, "Fünfer": None, "Sechser": None,
            "Oben Summe": None, "Bonus": None,
            "Dreierpasch": None, "Viererpasch": None,
            "Full House": None, "Kleine Straße": None,
            "Große Straße": None, "Kniffel": None, "Chance": None,
            "Unten Summe": None, "Gesamt": None
        }
        self.punkte_eingetragen = {k: False for k in self.punkte}
        self.bonus_erreicht = False
        self.erstelle_gui()

    def erstelle_gui(self):
        # Würfel-Labels
        self.würfel_labels = []
        for i in range(5):
            label = tk.Label(self.fenster, text="?", font=("Arial", 24), width=2, relief="solid", borderwidth=1)
            label.grid(row=0, column=i, padx=5, pady=5)
            label.bind("<Button-1>", lambda event, index=i: self.würfel_halten(index))
            self.würfel_labels.append(label)

        # Würfeln-Button
        self.würfeln_button = tk.Button(self.fenster, text="Würfeln", command=self.würfeln)
        self.würfeln_button.grid(row=1, column=0, columnspan=5, pady=10)

        # Punktetabelle
        self.punkte_labels = {}
        row = 2
        self.obere_hälfte_labels = ["Einser", "Zweier", "Dreier", "Vierer", "Fünfer", "Sechser", "Oben Summe", "Bonus"]
        self.untere_hälfte_labels = ["Dreierpasch", "Viererpasch", "Full House", "Kleine Straße", "Große Straße", "Kniffel", "Chance", "Unten Summe","Gesamt"]

        def erstelle_punkt_reihe(kategorien):
            nonlocal row
            for kategorie in kategorien:
                label = tk.Label(self.fenster, text=f"{kategorie}:", anchor="w", width=15)
                label.grid(row=row, column=0, sticky="w", padx=(10,0))
                entry = tk.Entry(self.fenster, width=5, state="readonly", justify="center")
                entry.grid(row=row, column=1, padx=(0,10))
                self.punkte_labels[kategorie] = entry
                row += 1
            if kategorien[0] in ["Einser"]:
                tk.Label(self.fenster).grid(row=row, column=0, pady=5)
                row += 1
            if kategorien[-1] in ["Chance"]:
                tk.Label(self.fenster).grid(row=row, column=0, pady=5)
                row += 1
        erstelle_punkt_reihe(self.obere_hälfte_labels)
        erstelle_punkt_reihe(self.untere_hälfte_labels)

        # Eintragen-Button
        self.eintragen_button = tk.Button(self.fenster, text="Eintragen", command=self.eintragen, state="disabled")
        self.eintragen_button.grid(row=row, column=0, columnspan=2, pady=10)
        self.gewählte_kategorie = None
        self.dropdown_var = tk.StringVar(self.fenster)
        self.dropdown_var.set("Kategorie wählen")

        self.dropdown = tk.OptionMenu(self.fenster, self.dropdown_var, *list(self.punkte.keys()), command=self.auswahl_ändern)
        self.dropdown.grid(row=row+1, column=0, columnspan=2,pady = (0,10))
        self.dropdown.config(state = "disabled") # Dropdown am Anfang deaktivieren


    def auswahl_ändern(self, value):
        self.gewählte_kategorie = value
        if self.gewählte_kategorie in ["Oben Summe", "Bonus", "Unten Summe","Gesamt"]:
            self.gewählte_kategorie = None
            self.dropdown_var.set("Diese Kategorie wird automatisch berechnet")

    def würfeln(self):
        if self.würfe < 3:
            self.würfe += 1
            self.ergebnisse = [random.randint(1, 6) if not self.gehaltene_würfel[i] else self.ergebnisse[i] for i in range(5)]
            for i, label in enumerate(self.würfel_labels):
                label.config(text=self.ergebnisse[i])
            self.eintragen_button.config(state="normal")
            self.dropdown.config(state = "normal")
        else:
            messagebox.showinfo("Kniffel", "Du hast schon dreimal gewürfelt!")

    def würfel_halten(self, index):
        if self.würfe > 0:
            self.gehaltene_würfel[index] = not self.gehaltene_würfel[index]
            if self.gehaltene_würfel[index]:
                self.würfel_labels[index].config(bg="lightblue")
            else:
                self.würfel_labels[index].config(bg="SystemButtonFace")

    def eintragen(self):
        if self.gewählte_kategorie is None:
            messagebox.showerror("Fehler", "Bitte eine Kategorie auswählen!")
            return

        if self.punkte_eingetragen[self.gewählte_kategorie]:
            messagebox.showerror("Fehler", "Diese Kategorie wurde bereits eingetragen!")
            return

        punkte = self.berechne_punkte(self.gewählte_kategorie)
        self.punkte_labels[self.gewählte_kategorie].config(state="normal")
        self.punkte_labels[self.gewählte_kategorie].insert(0, str(punkte))
        self.punkte_labels[self.gewählte_kategorie].config(state="readonly")
        self.punkte_eingetragen[self.gewählte_kategorie] = True

        # Berechnungen und zurücksetzen
        self.berechne_summen_und_bonus()
        self.würfe = 0
        self.eintragen_button.config(state="disabled")
        self.dropdown.config(state = "disabled")
        self.dropdown_var.set("Kategorie wählen")
        for label in self.würfel_labels:
            label.config(text="?", bg="SystemButtonFace")
        self.gehaltene_würfel = [False] * 5

    def berechne_punkte(self, kategorie):
        anzahl = [self.ergebnisse.count(i) for i in range(1, 7)] # Anzahl der Würfel pro Augenzahl
        sortiert = sorted(self.ergebnisse)

        if kategorie == "Einser":
            return self.ergebnisse.count(1) * 1
        elif kategorie == "Zweier":
            return self.ergebnisse.count(2) * 2
        elif kategorie == "Dreier":
            return self.ergebnisse.count(3) * 3
        elif kategorie == "Vierer":
            return self.ergebnisse.count(4) * 4
        elif kategorie == "Fünfer":
            return self.ergebnisse.count(5) * 5
        elif kategorie == "Sechser":
            return self.ergebnisse.count(6) * 6
        elif kategorie == "Dreierpasch":
            return sum(self.ergebnisse) if max(anzahl) >= 3 else 0
        elif kategorie == "Viererpasch":
            return sum(self.ergebnisse) if max(anzahl) >= 4 else 0
        elif kategorie == "Full House":
            return 25 if 3 in anzahl and 2 in anzahl else 0
        elif kategorie == "Kleine Straße":
            return 30 if (sortiert[3] - sortiert[0] == 3 or sortiert[4] - sortiert[1] == 3) else 0
        elif kategorie == "Große Straße":
            return 40 if (sortiert[4] - sortiert[0] == 4) and len(set(sortiert)) == 5 else 0
        elif kategorie == "Kniffel":
            return 50 if 5 in anzahl else 0
        elif kategorie == "Chance":
            return sum(self.ergebnisse)
        else:
            return 0

    def berechne_summen_und_bonus(self):
        oben_summe = sum(int(self.punkte_labels[k].get()) for k in ["Einser", "Zweier", "Dreier", "Vierer", "Fünfer", "Sechser"] if self.punkte_labels[k].get())
        self.punkte["Oben Summe"] = oben_summe
        self.punkte_labels["Oben Summe"].config(state="normal")
        self.punkte_labels["Oben Summe"].delete(0, tk.END)
        self.punkte_labels["Oben Summe"].insert(0, str(oben_summe))
        self.punkte_labels["Oben Summe"].config(state="readonly")

        if oben_summe >= 63:
            self.punkte["Bonus"] = 35
        else:
            self.punkte["Bonus"] = 0

        self.punkte_labels["Bonus"].config(state="normal")
        self.punkte_labels["Bonus"].delete(0, tk.END)
        self.punkte_labels["Bonus"].insert(0, str(self.punkte["Bonus"]))
        self.punkte_labels["Bonus"].config(state="readonly")

        unten_summe = sum(int(self.punkte_labels[k].get()) for k in ["Dreierpasch", "Viererpasch", "Full House", "Kleine Straße", "Große Straße", "Kniffel", "Chance"] if self.punkte_labels[k].get())
        self.punkte["Unten Summe"] = unten_summe
        self.punkte_labels["Unten Summe"].config(state="normal")
        self.punkte_labels["Unten Summe"].delete(0, tk.END)
        self.punkte_labels["Unten Summe"].insert(0, str(unten_summe))
        self.punkte_labels["Unten Summe"].config(state="readonly")

        gesamt_punkte = oben_summe + self.punkte["Bonus"] + unten_summe
        self.punkte["Gesamt"] = gesamt_punkte
        self.punkte_labels["Gesamt"].config(state="normal")
        self.punkte_labels["Gesamt"].delete(0, tk.END)
        self.punkte_labels["Gesamt"].insert(0, str(gesamt_punkte))
        self.punkte_labels["Gesamt"].config(state="readonly")

        # Spielende prüfen
        if all(self.punkte_eingetragen.values()):
            self.spiel_beenden()

    def spiel_beenden(self):
        gesamtpunkte = self.punkte["Gesamt"]
        messagebox.showinfo("Spiel beendet", f"Das Spiel ist beendet! Ihre Gesamtpunktzahl beträgt: {gesamtpunkte}")
        self.fenster.quit()

# Spiel starten
spiel = Kniffel()
spiel.fenster.mainloop()