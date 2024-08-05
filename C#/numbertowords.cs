using System;

public class NumberToWords
{
    private static readonly string[] units = { "", "thousand", "million", "billion", "trillion" };
    private static readonly string[] numNames = {
        "zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine",
        "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen",
        "eighteen", "nineteen", "twenty", "thirty", "forty", "fifty", "sixty", "seventy",
        "eighty", "ninety"
    };

    public static string NumberToWords(double number)
    {
        if (number == 0)
        {
            return "Zero";
        }

        string[] parts = number.ToString("F2").Split('.');
        int integerPart = int.Parse(parts[0]);
        int fractionPart = int.Parse(parts[1]);

        string words = ConvertInteger(integerPart);
        if (fractionPart > 0)
        {
            words += " and " + ConvertFraction(fractionPart);
        }

        return words.Trim();
    }

    private static string ConvertInteger(int number)
    {
        if (number == 0)
        {
            return "zero";
        }

        string result = "";
        int unitIndex = 0;

        while (number > 0)
        {
            int chunk = number % 1000;
            if (chunk > 0)
            {
                result = ConvertChunk(chunk) + " " + units[unitIndex] + " " + result;
            }
            number /= 1000;
            unitIndex++;
        }

        return result.Trim() + " yuan";
    }

    private static string ConvertChunk(int number)
    {
        if (number < 20)
        {
            return numNames[number];
        }
        else if (number < 100)
        {
            return numNames[20 + number / 10 - 2] + (number % 10 != 0 ? " " + numNames[number % 10] : "");
        }
        else
        {
            return numNames[number / 100] + " hundred" + (number % 100 != 0 ? " and " + ConvertChunk(number % 100) : "");
        }
    }

    private static string ConvertFraction(int fraction)
    {
        if (fraction == 0)
        {
            return "";
        }

        string fractionText = "";
        if (fraction >= 10)
        {
            fractionText += ConvertChunk(fraction) + " ";
        }
        else
        {
            fractionText += "zero " + ConvertChunk(fraction) + " ";
        }

        return fractionText + "fen";
    }

    public static void Main(string[] args)
    {
        Console.WriteLine(NumberToWords(1234567.89));
    }
}
