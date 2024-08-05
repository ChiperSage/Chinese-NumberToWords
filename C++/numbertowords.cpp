#include <iostream>
#include <string>
#include <vector>
#include <cmath>
#include <sstream>
#include <iomanip>

using namespace std;

const vector<string> units = { "", "thousand", "million", "billion", "trillion" };
const vector<string> numNames = {
    "zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine",
    "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen",
    "eighteen", "nineteen", "twenty", "thirty", "forty", "fifty", "sixty", "seventy",
    "eighty", "ninety"
};

string convertChunk(int number);

string numberToWords(double number) {
    if (number == 0) {
        return "Zero";
    }

    int integerPart = static_cast<int>(number);
    int fractionPart = round((number - integerPart) * 100);

    string words = "";
    if (integerPart > 0) {
        words += convertChunk(integerPart);
    }

    if (fractionPart > 0) {
        words += (words.empty() ? "" : " and ") + convertChunk(fractionPart) + " fen";
    }

    return words + " yuan";
}

string convertChunk(int number) {
    if (number < 20) {
        return numNames[number];
    } else if (number < 100) {
        return numNames[20 + number / 10 - 2] + (number % 10 != 0 ? " " + numNames[number % 10] : "");
    } else if (number < 1000) {
        return numNames[number / 100] + " hundred" + (number % 100 != 0 ? " and " + convertChunk(number % 100) : "");
    } else {
        int unitIndex = 0;
        string result = "";
        while (number > 0) {
            int chunk = number % 1000;
            if (chunk > 0) {
                result = convertChunk(chunk) + " " + units[unitIndex] + " " + result;
            }
            number /= 1000;
            unitIndex++;
        }
        return result;
    }
}

int main() {
    double number = 1234567.89;
    cout << numberToWords(number) << endl;
    return 0;
}
