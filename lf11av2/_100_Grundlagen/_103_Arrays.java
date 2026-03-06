package _100_Grundlagen;
import java.util.ArrayList;

public class _103_Arrays {
    public static void main(String[] args) {
        ArrayList<Double> zahlen = new ArrayList<>();
        zahlen.add(3.0);
        zahlen.add(7.234234);
        zahlen.add(2143.23);
        zahlen.add(13.0);

        // Zahlen aus dem Array in einer for-Schleife ausgeben lassen
        System.out.println("\n");
        System.out.println("Die komplette Liste aller Zahlen:");
        for (double zahl : zahlen) {
            System.out.println(zahl);
        }

        // Anzahl der Zahlen ausgeben lassen
        System.out.println("Anzahl der Zahlen im Array: " + zahlen.size());

        // Neuen Wert einsetzen
        // Erste Zahl ist der Index, die zweite Zahl, die eingesetzt werden soll
        zahlen.set(0, 234.01);

        // Den Index von einem bestimmten Wert ausgeben lassen
        System.out.println("Die Zahl 13 ist an der " + zahlen.indexOf(13.0) + " Stelle");  // 13 ist an der 3 Stelle

        // Nur einen bestimmten Wert ausgeben, anhand vom Index
        System.out.println("An erster Stelle steht die Zahl: " + zahlen.get(1)); // Gibt 7.234234 aus (zweites Element)

        ArrayList<String> woerter = new ArrayList<>();
        woerter.add("Hallo");
        woerter.add("Welt");
        woerter.add("oder");
        woerter.add("Hallo");
        woerter.add("Mars");

        // Wörter aus dem Array in einer for-Schleife ausgeben lassen
        System.out.println("\n");
        System.out.println("Die komplette Liste aller Wörter:");
        for (String wort : woerter) {
                System.out.print(wort + " "); // Leerzeichen sorgt für Abstand
        }
        System.out.println("\n");

        // Anzahl der Wörter ausgeben lassen
        System.out.println("Anzahl der Wörter im Array: " + woerter.size());
    }
}
