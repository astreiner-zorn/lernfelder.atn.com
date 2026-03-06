package _100_Grundlagen;
import java.util.Random;

public class _102_Zufallszahlen {
    public static void main(String[] args) {
        Random r = new Random();

        // Gibt von 0 - X aus
        System.out.println(r.nextInt( 100));  // 0 bis 100

        // Wenn nur bestimmte Zahlen gewünscht sind
        System.out.println(r.nextInt(50, 60));
    }
}
