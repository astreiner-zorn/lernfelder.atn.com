package Javaübungen;

public class LaessigHungrig {
    public static void main(String[] args) {
        String textzeile = "IIcchh  bbiinn  hluänsgsriigg \n \n";

        for (int iii = 0; iii < textzeile.length(); iii = iii +2 ) {
            System.out.print(textzeile.charAt(iii));
        }

        for (int iii = 1; iii < textzeile.length(); iii = iii +2 ) {
            System.out.print(textzeile.charAt(iii));
        }

        System.exit(0);
    }
}