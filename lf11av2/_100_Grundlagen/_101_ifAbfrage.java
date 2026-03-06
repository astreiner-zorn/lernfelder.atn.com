package _100_Grundlagen;

public class _101_ifAbfrage {
    public static void main(String[] args) {
        int zahl1 = 30;
        int zahl2 = 20;
        int zahl3 = 10;

        if (zahl1 < zahl2) {
            System.out.println(("Die erste Zahl " + "(" + zahl1 + ")" + " ist kleiner als die zweite Zahl " + "(" + zahl2 + ")"));
        } else {
            System.out.println(("Die erste Zahl " + "(" + zahl1 + ")" + " ist größer als die zweite Zahl " + "(" + zahl2 + ")"));
        }

        if (zahl2 + zahl3 == zahl1) {
            System.out.println("Du hast vollkommen Recht! ");
        }
    }
}

