package _200_Aufgaben;

import java.util.Random;

public class _010_ZweiZahlenGenauVergleichen {

    public static void main(String[] args) {

        /*
         * Zwei Zahlen genau vergleichen
         *
         * Schreibe ein Programm, das zwei zufällige Zahlen erzeugt.
         * Dann soll das Programm testen und ausgeben,
         * welche von den beiden Zahlen größer ist oder ob beide Zahlen gleich groß sind.
         */

        Random random = new Random();
        int zahl1 = random.nextInt(100);
        int zahl2 = random.nextInt(100);

        if (zahl1 < zahl2) {
            System.out.println("Die erste Zahl " + "(" + zahl1 + ") " + "ist kleiner als die zweite Zahl " + "(" + zahl2 + ").");
        } else if (zahl1 > zahl2 ){
            System.out.println("Die erste Zahl " + "(" + zahl1 + ") " + "ist größer als die zweite Zahl " + "(" + zahl2 + ").");
        } else {
            System.out.println("Bei der Generierung sind die gleichen Zahlen rausgekommmen. Lul.");
        }

    }
}
