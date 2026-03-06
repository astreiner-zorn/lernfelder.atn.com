package _100_Beginn;

public class _103_Rechenoperatoren {
    public static void main(String[] args) {
        // Addition
        System.out.println(3 + 4);

        // Subtraktion

        System.out.println(13-7);
        // Multiplikation
        System.out.println(3 * 7);

        // Division
        System.out.println(21 / 3);

        // Bei 2 Integern gibt es immer einen Integer zurück:
        System.out.println(23 / 3);
        System.out.println(23 / 3.0);
        System.out.println(23.0 / 3.0);
        System.out.println(37 / 37);

        // Modulo - Restwert
        System.out.println(37 % 7);

        // -> 1: Wie oft geht die 7 in die 37, wobei das egal ist - 2: Modulo schaut, was dann noch übrig bleibt
        System.out.println(37 % 37); // Hier bleibt natürlich die 0 raus

        // Inkrement % Dekrement Operatoren
        int zahl = 7;

        zahl++;
        System.out.println(zahl);

        zahl--;
        System.out.println(zahl);
    }
}
