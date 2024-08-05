<?php
function numberToWords($number) {
    $units = array(
        '', 'thousand', 'million', 'billion', 'trillion'
    );
    
    $unitNames = array(
        '', 'yuan', 'jiao', 'fen'
    );
    
    $numNames = array(
        0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
        5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 
        14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 
        18 => 'eighteen', 19 => 'nineteen', 20 => 'twenty', 30 => 'thirty', 
        40 => 'forty', 50 => 'fifty', 60 => 'sixty', 70 => 'seventy', 
        80 => 'eighty', 90 => 'ninety'
    );

    if ($number == 0) {
        return "Zero";
    }
    
    $number = number_format($number, 2, '.', '');
    list($integer, $fraction) = explode('.', $number);
    
    $integer = (int)$integer;
    $fraction = (int)$fraction;
    
    $words = '';
    if ($integer > 0) {
        $words .= convertInteger($integer, $units);
    }
    
    if ($fraction > 0) {
        $words .= ($words ? ' and ' : '') . convertFraction($fraction, $unitNames);
    }
    
    return trim($words);
}

function convertInteger($number, $units) {
    $numNames = array(
        0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
        5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 
        14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 
        18 => 'eighteen', 19 => 'nineteen', 20 => 'twenty', 30 => 'thirty', 
        40 => 'forty', 50 => 'fifty', 60 => 'sixty', 70 => 'seventy', 
        80 => 'eighty', 90 => 'ninety'
    );
    
    $result = '';
    $unitIndex = 0;
    
    while ($number > 0) {
        $chunk = $number % 1000;
        if ($chunk > 0) {
            $result = convertChunk($chunk) . ' ' . $units[$unitIndex] . ' ' . $result;
        }
        $number = (int)($number / 1000);
        $unitIndex++;
    }
    
    return trim($result) . ' yuan';
}

function convertChunk($number) {
    $numNames = array(
        0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
        5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 
        14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 
        18 => 'eighteen', 19 => 'nineteen', 20 => 'twenty', 30 => 'thirty', 
        40 => 'forty', 50 => 'fifty', 60 => 'sixty', 70 => 'seventy', 
        80 => 'eighty', 90 => 'ninety'
    );

    if ($number < 20) {
        return $numNames[$number];
    } elseif ($number < 100) {
        return $numNames[$number - $number % 10] . ' ' . $numNames[$number % 10];
    } elseif ($number < 1000) {
        return $numNames[(int)($number / 100)] . ' hundred ' . convertChunk($number % 100);
    }
}

function convertFraction($fraction, $unitNames) {
    if ($fraction == 0) {
        return '';
    }
    
    $fractionText = '';
    
    if ($fraction >= 10) {
        $fractionText .= convertChunk($fraction) . ' ';
    } else {
        $fractionText .= 'zero ' . convertChunk($fraction) . ' ';
    }
    
    return $fractionText . 'fen';
}

echo numberToWords(1234567.89);
?>
