package _200_Aufgaben;

public class _40_Dominosteine {
    public static void main(String[] args) {

        /*
         * Dominosteine
         *
         * Schreibe ein Programm,
         * das alle möglichen Dominosteine in der folgenden Form ausgibt.
         *
         * (0|0)(0|1)(0|2)(0|3)(0|4)(0|5)(0|6)
         *      (1|1)(1|2)(1|3)(1|4)(1|5)(1|6)
         *           (2|2)(2|3)(2|4)(2|5)(2|6)
         *                (3|3)(3|4)(3|5)(3|6)
         *                     (4|4)(4|5)(4|6)
         *                          (5|5)(5|6)
         *                               (6|6)
         */

        for (int d1 = 0; d1 <= 6; d1++) {

            for (int i = 0; i < d1; i++) {
                System.out.print("     ");
            }

            for (int d2 = d1; d2 <= 6; d2++) {
                System.out.print("(" + d1 + "|" + d2 + ")");
            }
            System.out.println();
        }
    }
}
