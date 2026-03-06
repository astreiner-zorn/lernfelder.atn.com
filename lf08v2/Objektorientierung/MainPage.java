package Objektorientierung;

public class MainPage {

    public static void main(String[] args) {
        Person person = new Person("Sven", 32);
        person.vorstellen();

        Auto auto = new Auto("VW", "rot");
        auto.zeigeDetails();
    }

}