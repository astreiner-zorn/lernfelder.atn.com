def studentenliste(name, studienfach):
    print(f"Der Student heißt {name} und studiert das Fach {studienfach}")
    
name = input("Bitte gib deinen Namen an: ")
studienfach = input("Bitte gib dein Studienfach an: ")

studentenliste(name, studienfach)

## Argument mit Keyword kennzeichnen, damit die Reihenfolge bei den Argumenten keine Rolle spielt
# studentenliste(name = name, studienfach = studienfach)