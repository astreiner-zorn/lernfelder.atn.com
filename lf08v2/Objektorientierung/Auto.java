package Objektorientierung;

public class Auto {
    private String marke;
    private String farbe;

    public Auto(String marke, String farbe) {
        this.marke = marke;
        this.farbe = farbe;
    }

    public void zeigeDetails() {
        System.out.println("Das Auto ist ein " + farbe + "er " + marke + ".");
    }
}