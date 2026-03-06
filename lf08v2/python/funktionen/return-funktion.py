name = input("Bitte gib deinen Namen an: ")
studienfach = input("Bitte gib dein Studienfach an: ")

def student_anlegen(name, studienfach):
    student = {"Student": name, "Studienfach": studienfach}
    return student
    
student = student_anlegen(name, studienfach)

for key, value in student.items():
    print(f"{key}: {value}")