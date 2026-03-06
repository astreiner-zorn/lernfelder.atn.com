package Objektorientierung;

public class Person {
    private String name;
    private int alter;

    public Person(String name, int alter) {
        this.name = name;
        this.alter = alter;
    }

    public void vorstellen() {
        System.out.println("Hallo, ich heiße " + name + " und bin " + alter + " Jahre alt.");
    }
}