package _200_Aufgaben;

public class _030_Zahlenreihen {

    public static void main(String[] args) {

        System.out.println("\n");
        /* 1.
         * Schreibe eine for-Schleife, die Folgendes ausgibt:
         * 100 90 80 70 60 50 40 30 20 10
         */

        int zahl;
        for (zahl = 100; zahl >= 10; zahl -= 10) {
            System.out.println(zahl + " "); // Ausgabe in einer Zeile
        }

        System.out.println("\n");
        /* 2.
         * Schreibe eine for-Schleife, die Folgendes ausgibt:
         * 2000 3000 4000 5000 6000
         */

        for (zahl = 2000; zahl <= 6000; zahl += 1000) {
            System.out.println(zahl + " ");
        }

        System.out.println("\n");
        /* 3.
         * Schreibe eine for-Schleife, die Folgendes ausgibt:
         * 2.0 1.5 1.0 0.5 0.0 -0.5 -1.0
         */

        for (double i = 2.0; i >= -1.0; i -= 0.5) {
            System.out.println(i + " ");
        }

        System.out.println("\n");
        /* 4.
         * Schreibe eine for-Schleife, die Folgendes ausgibt:
         * 1,0 2,2 3,4 4,6 5,8 7,0 8,2 9,4
         */

        for (double a = 1.0; a <= 9.4; a += 1.2) {
            System.out.println(a + " ");
        }

        System.out.println("\n");
        /* 5.
         * Schreibe eine for-Schleife, die Folgendes ausgibt:
         * Z5 Z7 Z9 Z11 Z13
         */

        for (zahl = 5; zahl <=13; zahl+=2) {
            System.out.println("Z"+zahl);
        }

        System.out.println("\n");
        /* 6.
         * Schreibe ein Programm, das per for-Schleife
         * alle Zahlen von 1 bis 20 addiert
         * und danach das Endergebnis ausgibt.
         */

        int summe = 0;
        for (int i = 1; i <= 20; i++) {
            summe = summe + i;
        }
        System.out.println("Alle Zahlen zusammengerechnet ergeben: " + summe);

        System.out.println("\n");
        /* 7.
         * Schreibe eine for-Schleife, die Folgendes ausgibt:
         * a2b3 a12b13 a22b23
         */

        for (int zahl1 = 2, zahl2 = 3; zahl1 <= 22; zahl1+=10, zahl2+=10) {
            System.out.println("a" + zahl1 + "b" + zahl2);
        }

        System.out.println("\n");
        /* 8.
         * Schreibe eine for-Schleife, die Folgendes ausgibt:
         * 13 17 21 29 33 37 45
         */
        for (zahl = 13; zahl <= 45; zahl += 4) {
            System.out.println(zahl + " ");
        }


        System.out.println("\n");
        /* 9.
         * Schreibe EINE for-Schleife, die Folgendes ausgibt:
         * 1 2 3 4 5 4 3 2 1
         */

        for (int i = 1; i <= 9; i++) {
            if (i <= 5) {
                System.out.print(i + " ");         // Aufsteigend
            } else {
                System.out.print((10 - i) + " ");  // Absteigend
            }
        }

        System.out.println("\n");
        /* 10.
         * Schreibe ein Programm, das mit EINER while-Schleife
         * alle natürlichen Zahlen von 1 bis 39 sowie 61 bis 100
         * (jeweils einschließlich) der Größe nach ausgibt:
         * 1 2 3 4 ..... 36 37 38 39 61 62 63 64 ... 97 98 99 100
         */
    }
}
