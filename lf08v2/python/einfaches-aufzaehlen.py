start = int(input("Bitte gib die Zahl an, mit der du beginnen möchtest: "))
ende = int(input("Bitte gib die Zahl an, mit der du enden möchtest: "))
schrittweise = int(input("Bitte gib die Zahl an, mit der du zählen möchtest: "))

def zahlen_ausgeben(var1, var2, var3):
    for zahl in range(start, ende, schrittweise):
        print(zahl)
        
meine_zahlen = zahlen_ausgeben(start, ende, schrittweise)
print(meine_zahlen)
