package _200_Aufgaben;
import java.util.Random;

public class _020_Begruessung {
    public static void main(String[] args) {
        /*
         * Begrüßung
         *
         * Es soll eine Begrüssung in Abhängigkeit zur Uhrzeit
         * ausgegeben werden.
         * Zwischen 22Uhr und 5Uhr: Gute Nacht.
         * Vor 11Uhr: Guten Morgen.
         * Vor 15Uhr: Mahlzeit.
         * Vor 18Uhr: Guten Nachmittag.
         * Vor 22Uhr: Guten Abend
         *
         * Erstelle die Stunde per Zufall zwischen 0 - 23.
         */

        String name = "Sven";
        Random random = new Random();
        int uhrzeit = random.nextInt(24);
        System.out.println("Es ist " + uhrzeit + " Uhr, also:");

        if (uhrzeit >= 22 || uhrzeit < 5) {
            System.out.println("Gute Nacht " + name);
        } else if (uhrzeit < 11) {
            System.out.println("Guten Morgen " + name);
        } else if (uhrzeit < 15) {
            System.out.println("Mahlzeit " + name);
        } else if (uhrzeit < 18) {
            System.out.println("Guten Nachmittag " + name);
        } else {
            System.out.println("Guten Abend " + name);
        }
    }
}
