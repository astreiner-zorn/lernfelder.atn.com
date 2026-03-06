package Javaübungen;
import java.util.Scanner;

public class EinfacheEingaben {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);

        System.out.print("Geben Sie bitte Ihren Vornamen an: ");
        String vorname = input.nextLine();

        System.out.print("Geben Sie bitte Ihren Nachnamen an: ");
        String nachname = input.nextLine();

        System.out.print("Geben Sie bitte Ihr Alter an: ");
        int alter = input.nextInt();

        System.out.print("Geben Sie bitte Ihre Körpergröße in cm an: ");
        int groesse = input.nextInt();

        System.out.print("\n" + "Sie heißen " + vorname + " " + nachname + ", Sie sind " + alter + " Jahre alt und Sie sind " + groesse + "cm groß.");

        input.close();
    }
}