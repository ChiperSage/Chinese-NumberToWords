public class NumberToWords {
    private static final String[] units = { "", "thousand", "million", "billion", "trillion" };
    private static final String[] numNames = {
        "zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine",
        "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", 
        "eighteen", "nineteen", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", 
        "eighty", "ninety"
    };

    public static String numberToWords(double number) {
        if (number == 0) {
            return "Zero";
        }

        String[] parts = String.format("%.2f", number).split("\\.");
        int integerPart = Integer.parseInt(parts[0]);
        int fractionPart = Integer.parseInt(parts[1]);

        String words = convertInteger(integerPart);
        if (fractionPart > 0) {
            words += " and " + convertFraction(fractionPart);
        }

        return words.trim();
    }

    private static String convertInteger(int number) {
        if (number == 0) {
            return "zero";
        }

        String result = "";
        int unitIndex = 0;

        while (number > 0) {
            int chunk = number % 1000;
            if (chunk > 0) {
                result = convertChunk(chunk) + " " + units[unitIndex] + " " + result;
            }
            number /= 1000;
            unitIndex++;
        }

        return result.trim() + " yuan";
    }

    private static String convertChunk(int number) {
        if (number < 20) {
            return numNames[number];
        } else if (number < 100) {
            return numNames[20 + number / 10 - 2] + (number % 10 != 0 ? " " + numNames[number % 10] : "");
        } else {
            return numNames[number / 100] + " hundred" + (number % 100 != 0 ? " and " + convertChunk(number % 100) : "");
        }
    }

    private static String convertFraction(int fraction) {
        if (fraction == 0) {
            return "";
        }

        String fractionText = "";
        if (fraction >= 10) {
            fractionText += convertChunk(fraction) + " ";
        } else {
            fractionText += "zero " + convertChunk(fraction) + " ";
        }

        return fractionText + "fen";
    }

    public static void main(String[] args) {
        System.out.println(numberToWords(1234567.89));
    }
}
