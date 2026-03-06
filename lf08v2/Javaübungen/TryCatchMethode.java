package Javaübungen;

public class TryCatchMethode {
    public static void main(String[] args) {
        int[] feld = new int[5];

        try {
            System.out.println(feld[1]);
        } catch (Exception ex) {
            System.out.println("Es ist ein Fehler aufgetreten! " + ex);
        } finally {
            System.out.println("Das Programm wird beendet, auf Wiedersehen!");
        }

        System.out.println("Hallo!");
    }
}