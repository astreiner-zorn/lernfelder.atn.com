package _100_Beginn;

public class _102_PrimitiveDatentypen {
    public static void main(String[] args) {
        // Primitive Datentypen
        // Java ist stark typisiert.
        // Der Datentyp muss bei der Deklaration der Variable angegeben werden.
        // Und später kann kein anderer Wert zugewiesen werden.

        // Integer - Ganzzahl
        int zahl = 7;

        // zahl = "Hello"  // java: ';' erwartet
        System.out.println(zahl);  // 7

        // Double - Fließkommazahl
        double nummer = 3.14;
        System.out.println(nummer);

        // Boolean - Wahrheitswert
        boolean b1 = true;
        System.out.println(b1);
        boolean b2 = false;
        System.out.println(b2);

        // Char - Zeichen.
        // Muss in einfachen Anführungsstrichen stehen.
        char zeichen = 'A';
        System.out.println(zeichen);
    }
}