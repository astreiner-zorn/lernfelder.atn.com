package Javaübungen;

public class SwitchCase {
    public static void main(String[] args) {
        int farbeingabe = 1;

        switch (farbeingabe) {
            case 0: System.out.println("Rot");
                break;
            case 1: System.out.println("Grün");
                break;
            case 2: System.out.println("Blau");
                break;
            default: System.out.println("Keine Farbe gesetzt!");
                break;
        }
    }
}