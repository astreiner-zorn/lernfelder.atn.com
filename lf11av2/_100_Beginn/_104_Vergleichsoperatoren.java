package _100_Beginn;

public class _104_Vergleichsoperatoren {
    public static void main(String[] args) {

        int zahl = 23;
        if (zahl == 23) {
            System.out.println("Der Wert ist " + zahl);  // zahl ist 23
        }

        int zahl2 = 11;
        if (zahl2 != 23) {
            System.out.println("Das ist korrekt: 11 ist nicht gleich " + zahl);
        }

        // == != < > <= >=
        System.out.println(2 != 7);  // true
        System.out.println(3 == 4);  // false

    }
}